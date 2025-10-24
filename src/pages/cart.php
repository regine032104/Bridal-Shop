<?php
require_once('../backend/session_check.php');
require_once('../backend/connections.php');

$isLoggedIn = isLoggedIn();
$user_name = $_SESSION['user_name'] ?? null;
$user_email = $_SESSION['user_email'] ?? null;

// If the user clicked the add to cart button on the product page we can check for the form data
if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {

    $product_id = (int) $_POST['product_id'];
    $quantity = (int) $_POST['quantity'];

    $stmt = $pdo->prepare('SELECT * FROM products WHERE product_id = ?');
    $stmt->execute([$_POST['product_id']]);

    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if ($product && $quantity > 0) {
        // Product exists in database, now we can create/update the session variable for the cart
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                // Product exists in cart so just update the quantity
                $_SESSION['cart'][$product_id] += $quantity;
            } else {
                // Product is not in cart so add it
                $_SESSION['cart'][$product_id] = $quantity;
            }
        } else {
            // There are no products in cart, this will add the first product to cart
            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }
    // Prevent form resubmission...
    header('location: cart.php');
    exit;
}

// AJAX handler: auto-update cart quantities from client-side (debounced requests)
if (isset($_POST['ajax_update']) && isset($_SESSION['cart'])) {
    // Update session cart based on posted quantities. If a product key is missing or qty = 0 remove it.
    foreach ($_SESSION['cart'] as $id => $oldQty) {
        $key = 'quantity-' . $id;
        if (isset($_POST[$key]) && is_numeric($_POST[$key])) {
            $newQty = (int) $_POST[$key];
            if ($newQty > 0) {
                $_SESSION['cart'][$id] = $newQty;
            } else {
                unset($_SESSION['cart'][$id]);
            }
        } else {
            // key missing -> remove from cart
            unset($_SESSION['cart'][$id]);
        }
    }

    // Recalculate subtotal to return to client
    $newSubtotal = 0.00;
    if (!empty($_SESSION['cart'])) {
        $ids = array_keys($_SESSION['cart']);
        $array_to_question_marks = implode(',', array_fill(0, count($ids), '?'));
        $stmt = $pdo->prepare('SELECT * FROM products WHERE product_id IN (' . $array_to_question_marks . ')');
        $stmt->execute($ids);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $r) {
            $pid = $r['product_id'];
            if (isset($_SESSION['cart'][$pid])) {
                $newSubtotal += (float) $r['price'] * (int) $_SESSION['cart'][$pid];
            }
        }
    }

    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'subtotal' => number_format((float) $newSubtotal, 2, '.', '')]);
    exit;
}

// Remove product from cart, check for the URL param "remove", this is the product id, make sure it's a number and check if it's in the cart
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['remove']]);
}

// Update product quantities in cart if the user clicks the "Update" button on the shopping cart page
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    // Loop through the post data so we can update the quantities for every product in cart
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int) $v;
            // Always do checks and validation
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                // Update new quantity
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    // Prevent form resubmission...
    header('Location: cart.php');
    exit;
}

// Send the user to the place order page if they click the Place Order button, also the cart should not be empty
if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    header('Location: ../backend/place_order.php');
    exit;
}

// Check the session variable for products in cart
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;
// If there are products in cart
if ($products_in_cart) {
    // There are products in the cart so we need to select those products from the database
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM products WHERE product_id IN (' . $array_to_question_marks . ')');
    // We only need the array keys, not the values, the keys are the id's of the products
    $stmt->execute(array_keys($products_in_cart));
    // Fetch the products from the database and return the result as an Array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Calculate the subtotal
    foreach ($products as $product) {
        $subtotal += (float) $product['price'] * (int) $products_in_cart[$product['product_id']];
    }
}
?>
<?php
require_once('../layouts/app.php');
renderHeader([
    'title' => 'Cart - Promise Shop',
    'isLoggedIn' => $isLoggedIn,
    'bodyClass' => 'bg-white min-h-screen flex flex-col',
    'mainClass' => 'flex-1'
]);
?>
<div class="py-20 sm:py-32 cart content-wrapper">
    <div class="container mx-auto px-4 py-6 sm:px-6">
        <h1
            class="font-Tinos  text-2xl leading-none tracking-widest text-slate-900 uppercase md:tracking-[0.6em] lg:tracking-[0.8em] mb-8 text-center">
            Shopping Cart</h1>

        <?php if (isset($_GET['error']) && $_GET['error'] == '1'): ?>
            <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4">
                <p class="text-slate-700">There was an error placing your order. Please try again.</p>
            </div>
        <?php endif; ?>

        <?php if (empty($products)): ?>
            <div class="flex flex-col-reverse gap-8 lg:flex-row">
                <section class="flex-1">
                    <div
                        class="flex min-h-[360px] flex-col items-center justify-center rounded-2xl border border-pink-200 bg-white p-10 text-center shadow-[0_10px_30px_rgba(236,72,153,0.06)]">
                        <h2 class="font-Tinos text-3xl font-semibold text-slate-900 sm:text-4xl">
                            Your cart is empty.
                        </h2>
                        <p class="font-unna mt-4 max-w-md text-base leading-relaxed text-slate-700 sm:text-lg">
                            Browse our products and add items to see them here. We'll save
                            your selections once you add them.
                        </p>
                        <a href="shop.php"
                            class="mt-8 inline-flex items-center justify-center rounded-full bg-gradient-to-r from-pink-500 to-rose-500 px-8 py-3 font-medium text-white transition hover:shadow-[0_0_40px_rgba(236,72,153,0.25)] focus:ring-2 focus:ring-pink-400 focus:ring-offset-2 focus:ring-offset-pink-100 focus:outline-none">Start
                            Shopping</a>
                    </div>
                </section>

                <aside
                    class="w-full self-start rounded-xl border border-transparent bg-white p-6 shadow-lg lg:sticky lg:top-24 lg:w-96">
                    <h3 class="mb-4 text-2xl font-semibold text-slate-700">
                        Order Summary
                    </h3>
                    <div class="mb-2 flex justify-between text-slate-700">
                        <span>Subtotal</span>
                        <span>₱0.00</span>
                    </div>
                    <div class="mb-4 flex justify-between text-slate-700">
                        <span>Estimated Shipping</span>
                        <span>₱0.00</span>
                    </div>
                    <hr class="my-4 border-t border-pink-100" />
                    <div class="mb-6 flex justify-between text-lg font-semibold text-slate-700">
                        <span>Total</span>
                        <span>₱0.00</span>
                    </div>
                    <button disabled
                        class="w-full cursor-not-allowed rounded-md bg-pink-300 py-3 font-semibold text-white opacity-90">
                        Cart is Empty
                    </button>
                </aside>
            </div>
        <?php else: ?>
            <form action="cart.php" method="post">
                <div class="flex flex-col-reverse gap-8 lg:flex-row">
                    <section class="flex-1">
                        <div
                            class="bg-white rounded-2xl border border-pink-500 shadow-[0_10px_30px_rgba(236,72,153,0.06)] overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead class="bg-pink-50">
                                        <tr>
                                            <td class="p-4 font-semibold text-slate-900" colspan="2">Product</td>
                                            <td class="p-4 font-semibold text-slate-900">Price</td>
                                            <td class="p-4 font-semibold text-slate-900">Quantity</td>
                                            <td class="p-4 font-semibold text-slate-900">Total</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($products as $product): ?>
                                            <tr class="border-t border-pink-100" data-id="<?= $product['product_id'] ?>"
                                                data-price="<?= $product['price'] ?>">
                                                <td class="p-4">
                                                    <a href="product-detail.php?id=<?= $product['product_id'] ?>" class="block">
                                                        <img src="../<?= str_replace('src/img/', 'img/', $product['image_path']) ?>"
                                                            width="80" height="80" alt="<?= $product['product_name'] ?>"
                                                            loading="lazy" decoding="async" class="rounded-lg object-cover">
                                                    </a>
                                                </td>
                                                <td class="p-4">
                                                    <a href="product-detail.php?id=<?= $product['product_id'] ?>"
                                                        class="font-semibold text-slate-700 hover:text-pink-600"><?= $product['product_name'] ?></a>
                                                    <br>
                                                    <small class="text-pink-600"><?= $product['material'] ?></small>
                                                    <br>
                                                    <a href="cart.php?remove=<?= $product['product_id'] ?>"
                                                        class="text-red-500 hover:text-red-700 text-sm">Remove</a>
                                                </td>
                                                <td class="p-4 font-semibold text-slate-700">
                                                    <?= format_price($product['price']) ?>
                                                </td>
                                                <td class="p-4">
                                                    <div class="inline-flex items-center gap-2">
                                                        <button type="button"
                                                            class="qty-btn decrease inline-flex h-8 w-8 items-center justify-center rounded border bg-white text-slate-700"
                                                            aria-label="Decrease">-</button>
                                                        <input type="number" name="quantity-<?= $product['product_id'] ?>"
                                                            value="<?= $products_in_cart[$product['product_id']] ?>" min="0"
                                                            max="99" placeholder="Quantity" required
                                                            class="qty-input w-20 px-2 py-1 border border-pink-200 rounded text-center"
                                                            data-base-price="<?= $product['price'] ?>">
                                                        <button type="button"
                                                            class="qty-btn increase inline-flex h-8 w-8 items-center justify-center rounded border bg-white text-slate-700"
                                                            aria-label="Increase">+</button>
                                                    </div>
                                                </td>
                                                <td class="p-4 font-semibold text-slate-700 line-total"
                                                    data-line-total="<?= $product['price'] * $products_in_cart[$product['product_id']] ?>">
                                                    <?= format_price($product['price'] * $products_in_cart[$product['product_id']]) ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>

                    <aside
                        class="w-full self-start rounded-xl border border-transparent bg-white p-6 shadow-lg lg:sticky lg:top-24 lg:w-96">
                        <h3 class="mb-4 text-2xl font-semibold text-slate-900">
                            Order Summary
                        </h3>
                        <div class="mb-2 flex justify-between text-slate-900">
                            <span>Subtotal</span>
                            <span id="subtotal-amount"><?= format_price($subtotal) ?></span>
                        </div>
                        <div class="mb-4 flex justify-between text-slate-900">
                            <span>Estimated Shipping</span>
                            <span>₱0.00</span>
                        </div>
                        <hr class="my-4 border-t border-pink-100" />
                        <div class="mb-6 flex justify-between text-lg font-semibold text-slate-700">
                            <span>Total</span>
                            <span id="total-amount"><?= format_price($subtotal) ?></span>
                        </div>
                        <div class="space-y-3">
                            <!-- Update Cart removed: auto-update enabled -->
                            <input type="submit" value="Place Order" name="placeorder"
                                class="w-full rounded-md bg-gradient-to-r from-pink-500 to-rose-500 py-3 font-semibold text-white hover:shadow-[0_0_30px_rgba(236,72,153,0.25)] transition-all">
                        </div>
                    </aside>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>
<?php
renderFooter([
    'scripts' => [
        '<script src="https://unpkg.com/motion@latest/dist/motion.umd.js"></script>',
        '<script src="../js/main.js"></script>',
        '<script src="../js/validation-integration.js"></script>',
        '<script src="../js/auth.js"></script>',
        '<script src="../js/reveal.js"></script>',
        '<script src="../js/scroll-fade.js"></script>',
        '<script src="../js/reviews.js"></script>'
    ]
]);
?>

<script>
    // Cart quantity +/- and live total update
    (function () {
        function qs(sel, root) { return (root || document).querySelector(sel); }
        function qsa(sel, root) { return Array.from((root || document).querySelectorAll(sel)); }

        function formatPrice(num) { return '₱' + (Number(num) || 0).toFixed(2); }

        function recalcTotals() {
            var lineTotals = qsa('.line-total');
            var subtotal = 0;
            lineTotals.forEach(function (el) {
                var val = parseFloat(el.getAttribute('data-line-total')) || 0;
                subtotal += val;
            });
            // update subtotal and total
            var subtotalEl = qs('#subtotal-amount');
            var totalEl = qs('#total-amount');
            if (subtotalEl) subtotalEl.textContent = formatPrice(subtotal);
            if (totalEl) totalEl.textContent = formatPrice(subtotal);
        }

        // debounce helper
        function debounce(func, wait) {
            var timeout;
            return function () {
                var context = this, args = arguments;
                clearTimeout(timeout);
                timeout = setTimeout(function () { func.apply(context, args); }, wait);
            };
        }

        // Send quantities to server via AJAX (FormData) for persistent update
        function sendUpdateToServer() {
            var inputs = qsa('.qty-input');
            var fd = new FormData();
            fd.append('ajax_update', '1');
            inputs.forEach(function (input) {
                // only include inputs that exist in DOM; removed rows are considered removed
                fd.append(input.name, input.value);
            });

            fetch(window.location.pathname, {
                method: 'POST',
                credentials: 'same-origin',
                body: fd
            }).then(function (res) {
                if (!res.ok) throw new Error('Network response was not ok');
                return res.json();
            }).then(function (data) {
                if (data && data.subtotal !== undefined) {
                    var subtotalEl = qs('#subtotal-amount');
                    var totalEl = qs('#total-amount');
                    var numeric = parseFloat(data.subtotal) || 0;
                    if (subtotalEl) subtotalEl.textContent = '₱' + numeric.toFixed(2);
                    if (totalEl) totalEl.textContent = '₱' + numeric.toFixed(2);
                }
            }).catch(function (err) {
                console.error('Cart update failed:', err);
            });
        }

        var debouncedServerUpdate = debounce(sendUpdateToServer, 600);

        function updateLineTotalFromInput(input) {
            var qty = parseInt(input.value) || 0;
            var base = parseFloat(input.getAttribute('data-base-price')) || 0;
            var row = input.closest('tr');
            var lineCell = row && row.querySelector('.line-total');
            var newLine = base * qty;
            if (lineCell) {
                lineCell.setAttribute('data-line-total', newLine);
                lineCell.textContent = formatPrice(newLine);
            }
        }

        // handle clicks on +/- buttons
        document.addEventListener('click', function (e) {
            var dec = e.target.closest('.qty-btn.decrease');
            var inc = e.target.closest('.qty-btn.increase');
            if (dec || inc) {
                e.preventDefault();
                var btn = dec || inc;
                var row = btn.closest('tr');
                var input = row && row.querySelector('.qty-input');
                if (!input) return;
                var current = parseInt(input.value) || 0;
                if (btn.classList.contains('increase')) {
                    input.value = Math.min(99, current + 1);
                } else {
                    input.value = Math.max(0, current - 1);
                }
                updateLineTotalFromInput(input);
                // if quantity becomes 0, remove the row visually to indicate removal
                if (parseInt(input.value) === 0) {
                    // remove row from DOM so totals and UI reflect removal; user still must click 'Update Cart' to persist server-side
                    row.parentNode && row.parentNode.removeChild(row);
                }
                recalcTotals();
                // send updated quantities to server
                debouncedServerUpdate();
            }
        });

        // handle manual input changes
        document.addEventListener('input', function (e) {
            if (e.target && e.target.classList && e.target.classList.contains('qty-input')) {
                var input = e.target;
                var val = parseInt(input.value) || 0;
                if (val < 0) input.value = 0;
                if (val > 99) input.value = 99;
                updateLineTotalFromInput(input);
                if (parseInt(input.value) === 0) {
                    var row = input.closest('tr');
                    row && row.parentNode && row.parentNode.removeChild(row);
                }
                recalcTotals();
                // send updated quantities to server
                debouncedServerUpdate();
            }
        });

        // initial recalc (in case PHP generated different values)
        window.addEventListener('load', function () {
            qsa('.qty-input').forEach(function (input) { updateLineTotalFromInput(input); });
            recalcTotals();
        });
    })();
</script>