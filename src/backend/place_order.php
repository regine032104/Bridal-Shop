<?php
session_start();
require_once('connections.php');
require_once('session_check.php');

// Check if user is logged in
if (!isLoggedIn()) {
    header('Location: ../pages/home.php');
    exit;
}

// Check if cart exists and is not empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header('Location: ../pages/cart.php');
    exit;
}

// Get user ID from session
$user_id = $_SESSION['user_id'];

try {
    // Start transaction
    $pdo->beginTransaction();
    
    // Calculate total amount
    $total_amount = 0;
    $cart_items = [];
    
    // Get product details for cart items
    $product_ids = array_keys($_SESSION['cart']);
    $placeholders = str_repeat('?,', count($product_ids) - 1) . '?';
    $stmt = $pdo->prepare("SELECT * FROM products WHERE product_id IN ($placeholders)");
    $stmt->execute($product_ids);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Calculate total and prepare cart items
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
        $shipping_address = implode(', ', $address_parts);
    }
    
    $notes = 'Order placed via website';
    
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
    
    // Clear cart
    unset($_SESSION['cart']);
    
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
