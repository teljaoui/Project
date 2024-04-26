<?php

session_start();

include('connectiom.php');

// If user is not logged in
if (!isset($_SESSION['logged_in'])) {
    header('location: ../checkout.php?message=Please login/register to place an order');
    exit;
} else {
    if (isset($_POST['place_order'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $order_cost = $_SESSION['total'];
        $order_status = "not paid";
        $user_id = $_SESSION['user_id'];
        $order_date = date('Y-m-d H:i:s');

        $stmt = $conn->prepare("INSERT INTO orders (order_cost, order_status, user_id, user_phone, user_city, user_address, order_date)
                       VALUES (?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param('ississs', $order_cost, $order_status, $user_id, $phone, $city, $address, $order_date);

        $stmt_status = $stmt->execute();
        if (!$stmt_status) {
            header('location: ou.php');
            exit;
        }

        $order_id = $stmt->insert_id;

        echo $order_id;

        foreach ($_SESSION['cart'] as $key => $product) {
            $products_id = $product['products_id'];
            $products_name = $product['products_name'];
            $products_image = $product['products_image'];
            $products_price = $product['products_price'];
            $products_quantity = $product['products_quantity'];

            $stmt1 = $conn->prepare("INSERT INTO order_items (order_id, products_id, products_name, products_image, products_price, products_quantity, user_id, order_date)
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt1->bind_param('iissiiis', $order_id, $products_id, $products_name, $products_image, $products_price, $products_quantity, $user_id, $order_date);

            $stmt1->execute();
        }

        unset($_SESSION['cart']);

        $_SESSION['order_id'] = $order_id;

        header('location: ../payment.php?order_status=order placed successfully');
    }
}
?>
