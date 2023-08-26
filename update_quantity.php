<?php
session_start();

if (isset($_POST['product_name']) && isset($_POST['new_quantity'])) {
    $productName = $_POST['product_name'];
    $newQuantity = intval($_POST['new_quantity']);

    // Update the quantity of the specified product in the cart session
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['product_name'] == $productName) {
            $item['quantity'] = $newQuantity;
            break;
        }
    }

    // Return a response to indicate success
    echo json_encode(['status' => 'success']);
} else {
    // Return a response to indicate failure
    echo json_encode(['status' => 'error']);
}
?>
