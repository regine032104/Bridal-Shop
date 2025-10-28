<?php
session_start();
require_once('connections.php');
require_once('session_check.php');

// Check if user is logged in
if (!isLoggedIn()) {
    header('Location: ../pages/home.php');
    exit;
}

// Determine checkout mode: direct single-product order or cart-based
$isDirectOrder = isset($_POST['direct_product_id']) && is_numeric($_POST['direct_product_id'])
    && isset($_POST['direct_quantity']) && is_numeric($_POST['direct_quantity']);

// If not a direct order, require a non-empty cart
if (!$isDirectOrder && (!isset($_SESSION['cart']) || empty($_SESSION['cart']))) {
    header('Location: ../pages/cart.php');
    exit;
}

// Get user ID from session
$user_id = $_SESSION['user_id'];

try {
    // Start transaction
    $pdo->beginTransaction();

    // Calculate total amount and collect items depending on mode
    $total_amount = 0;
    $cart_items = [];

    if ($isDirectOrder) {
        // Direct order: single product + quantity
        $directProductId = (int) $_POST['direct_product_id'];
        $directQty = max(1, (int) $_POST['direct_quantity']);

        $stmt = $pdo->prepare("SELECT * FROM products WHERE product_id = ?");
        $stmt->execute([$directProductId]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$product) {
            // Invalid product -> back to shop with error
            header('Location: ../pages/shop.php?error=invalid_product');
            exit;
        }
        $item_total = $product['price'] * $directQty;
        $total_amount += $item_total;
        $cart_items[] = [
            'product_id' => $product['product_id'],
            'quantity' => $directQty,
            'unit_price' => $product['price']
        ];
    } else {
        // Cart-based: aggregate all items from session cart
        $product_ids = array_keys($_SESSION['cart']);
        $placeholders = str_repeat('?,', count($product_ids) - 1) . '?';
        $stmt = $pdo->prepare("SELECT * FROM products WHERE product_id IN ($placeholders)");
        $stmt->execute($product_ids);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($products as $product) {
            $quantity = $_SESSION['cart'][$product['product_id']];
            $item_total = $product['price'] * $quantity;
            $total_amount += $item_total;
            $cart_items[] = [
                'product_id' => $product['product_id'],
                'quantity' => $quantity,
                'unit_price' => $product['price']
            ];
        }
    }

    // Insert order
    $stmt = $pdo->prepare("
        INSERT INTO orders (customer_id, total_amount, status, shipping_address, payment_method, notes) 
        VALUES (?, ?, 'pending', ?, 'Cash on Delivery', ?)
    ");

    // Get user's address from database
    $user_stmt = $pdo->prepare("SELECT * FROM customers WHERE customer_id = ?");
    $user_stmt->execute([$user_id]);
    $user = $user_stmt->fetch();

    $shipping_address = '';
    if ($user) {
        $address_parts = array_filter([
            $user['street_address'],
            $user['barangay'],
            $user['city'],
            $user['province'],
            $user['zip_code']
        ]);
        // Require all address fields to be present
        if (count($address_parts) < 5) {
            // Redirect to profile (add address) if address is incomplete
            header('Location: ../pages/profile.php?error=missing_address');
            exit;
        }
        $shipping_address = implode(', ', $address_parts);
    }

    $notes = $isDirectOrder ? 'Direct order placed via shop page' : 'Order placed via cart';

    $stmt->execute([$user_id, $total_amount, $shipping_address, $notes]);
    $order_id = $pdo->lastInsertId();

    // Insert order items
    $stmt = $pdo->prepare("
        INSERT INTO order_items (order_id, product_id, quantity, unit_price) 
        VALUES (?, ?, ?, ?)
    ");

    foreach ($cart_items as $item) {
        $stmt->execute([
            $order_id,
            $item['product_id'],
            $item['quantity'],
            $item['unit_price']
        ]);
    }

    // Commit transaction
    $pdo->commit();

    // Clear cart only for cart-based checkout
    if (!$isDirectOrder) {
        unset($_SESSION['cart']);
    }

    // Store order ID in session for success page
    $_SESSION['last_order_id'] = $order_id;

    // Redirect to success page
    header('Location: ../pages/placeorder.php');
    exit;

} catch (Exception $e) {
    // Rollback transaction on error
    $pdo->rollback();

    // Log error (you might want to implement proper logging)
    error_log("Order placement error: " . $e->getMessage());

    // Redirect to cart with error message
    header('Location: ../pages/cart.php?error=1');
    exit;
}
?>