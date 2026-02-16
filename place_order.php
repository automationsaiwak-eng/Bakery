<?php
require_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['customer_name'];
    $phone = $_POST['customer_phone'];
    $address = $_POST['customer_address'];
    $cart_data = json_decode($_POST['cart_data'], true);

    if (empty($name) || empty($phone) || empty($address) || empty($cart_data)) {
        die("Invalid order data.");
    }

    try {
        $pdo->beginTransaction();

        // Calculate total
        $total_amount = 0;
        foreach ($cart_data as $item) {
            $total_amount += $item['price'] * $item['quantity'];
        }

        // Insert into orders table
        $stmt = $pdo->prepare("INSERT INTO orders (customer_name, customer_phone, customer_address, total_amount) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $phone, $address, $total_amount]);
        $order_id = $pdo->lastInsertId();

        // Insert items into order_items table
        $stmt_item = $pdo->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        foreach ($cart_data as $item) {
            $stmt_item->execute([$order_id, $item['id'], $item['quantity'], $item['price']]);
        }

        $pdo->commit();

        // Success - clear cart on client side as well
        echo "<script>
            localStorage.removeItem('bakery_cart');
            alert('Order placed successfully! Order ID: #$order_id');
            window.location.href = 'index.php';
        </script>";
        exit();

    } catch (Exception $e) {
        $pdo->rollBack();
        die("Order placement failed: " . $e->getMessage());
    }
} else {
    header("Location: checkout.php");
    exit();
}
?>
