<?php
include "sivuosat/top.php";
$title = $traCommon['cart_shopping'][$lang];
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
$script = 'lomake.js';
$css = 'styles-lomake.css';
include "sivuosat/header.php";
?>

<main>
    <section>
        <?php
        if (isset($_SESSION['Neilikka_cart']) && count($_SESSION['Neilikka_cart']) > 0) {
            $cart = $_SESSION['Neilikka_cart'];
            $cartTotal = 0;
        ?>


            <table>
                <thead>
                    <tr>
                        <th><?= $traCommon['product'][$lang] ?></th>
                        <th><?= $traCommon['price'][$lang] ?></th>
                        <th><?= $traCommon['quantity'][$lang] ?></th>
                        <th><?= $traCommon['total'][$lang] ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Assuming you have a database connection established ($yhteys)
                    foreach ($cart as $item_id => $quantity) {
                        // Retrieve product details (e.g., name, price) from your database
                        // Replace 'your_product_table' with your actual table name
                        $query = "SELECT plant, price FROM neil_plants_fi WHERE id = $item_id";
                        $result = $yhteys->query($query);

                        if ($result && $row = $result->fetch_assoc()) {
                            $product_name = $row['plant'];
                            $product_price = $row['price'];
                            $total_price = $product_price * $quantity;
                            $cartTotal += $total_price;
                    ?>
                            <tr>
                                <td><a href="sisakasvit.php?id=<?= $_SESSION['Neilikka_cart'][$item_id] ?>"><?= $product_name ?></a></td>
                                <td><?= number_format($product_price, 2) ?> &euro;</td>
                                <td><?= $quantity ?></td>
                                <td><?= number_format($total_price, 2) ?> &euro;</td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"><?= $traCommon['total'][$lang] ?>:</td>
                        <td><?= number_format($cartTotal, 2) ?> &euro;</td>
                    </tr>
                </tfoot>
            </table>

            <form action="ostoskori_tyhjenna.php" class="reset">
                <button type="submit"><?= $traCommon['cart_empty'][$lang] ?></button>
            </form>
        <?php
        } else { ?>
            <p><?= $traCommon['cart_is_empty'][$lang] ?></p>

        <?php
        } ?>

    </section>
</main>

<?php include "sivuosat/footer.php"; ?>