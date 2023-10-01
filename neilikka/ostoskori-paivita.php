<?php
if (!session_id()) session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['Neilikka_cart'])) {
    $cart = $_SESSION['Neilikka_cart'];

    // Loop through the submitted quantities and update the cart
    foreach ($_POST['quantity'] as $item_id => $new_quantity) {
        // Make sure the item exists in the cart
        if (isset($cart[$item_id])) {
            // Ensure the new quantity is a positive integer
            $new_quantity = max(1, intval($new_quantity));
            // Update the item's quantity in the cart
            $cart[$item_id] = $new_quantity;
        }
    }

    $_SESSION['Neilikka_cart'] = $cart;
}

header("Location: ostoskori.php");
exit();
