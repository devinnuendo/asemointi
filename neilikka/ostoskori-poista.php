<?php
if (!session_id()) session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_id = intval($_POST['item_id']);

    // Check if the item ID is valid and if the cart session exists
    if ($item_id > 0 && isset($_SESSION['Neilikka_cart'])) {
        // Retrieve the current cart
        $cart = $_SESSION['Neilikka_cart'];

        // Check if the item exists in the cart
        if (isset($cart[$item_id])) {
            // Remove the item from the cart
            unset($cart[$item_id]);

            // Update the cart session
            $_SESSION['Neilikka_cart'] = $cart;

            header("Location: ostoskori.php");
            exit();
        }
    }
}
