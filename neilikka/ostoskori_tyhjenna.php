<?php
if (!session_id()) session_start();

if (isset($_SESSION['Neilikka_cart']) && !empty($_SESSION['Neilikka_cart'])) {
    unset($_SESSION['Neilikka_cart']);
}

header('Location: ostoskori.php');
exit();
