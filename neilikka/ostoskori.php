<?php
include "sivuosat/top.php";
$title = $traCommon['cart_shopping'][$lang];
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
include "sivuosat/header.php";
if (!session_id()) session_start();
?>

<main>
    <section>
        <?php
        if (isset($_SESSION['Neilikka_cart']) && count($_SESSION['Neilikka_cart']) > 0) {
            $cart = $_SESSION['Neilikka_cart'];
            $cartTotal = 0;
        ?>
            <button onclick="<?php $_SESSION['Neilikka_cart'] = []; ?>">empty cart</button>

        <?php
            echo "cart :" . var_dump($cart);
            echo var_dump($_SESSION['Neilikka_cart']);
        } else { ?>
            <p><?= $traCommon['cart_empty'][$lang] ?></p>

        <?php
            echo var_dump($_SESSION['Neilikka_cart']);
        } ?>

    </section>
</main>

<?php include "sivuosat/footer.php"; ?>