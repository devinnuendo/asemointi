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

            <div class="table-wrap small">
                <table>
                    <thead>
                        <tr>
                            <th><?= $traCommon['product'][$lang] ?></th>
                            <th><?= $traCommon['price'][$lang] ?></th>
                            <th><?= $traCommon['quantity'][$lang] ?></th>
                            <th><?= $traCommon['total'][$lang] ?></th>
                            <th><span class="scr"><?= $traCommon['remove'][$lang] ?></span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($cart as $item_id => $quantity) {
                            $query = $lang == 'fi'
                                ? ("SELECT plant, color, price, amount 
                            FROM neil_plants_fi 
                            WHERE id = $item_id")
                                : ($lang == 'sv'
                                    ? ("SELECT sv.plant, sv.color, p.price, p.amount 
                                        FROM neil_plants_fi AS p 
                                        LEFT JOIN neil_plants_sv AS sv 
                                        ON p.id = sv.original_id 
                                        WHERE id = $item_id")
                                    : ("SELECT en.plant, en.color, p.price, p.amount 
                                        FROM neil_plants_fi AS p 
                                        LEFT JOIN neil_plants_en AS en 
                                        ON p.id = en.original_id 
                                        WHERE id = $item_id"));
                            $result = $yhteys->query($query);

                            if ($result && $row = $result->fetch_assoc()) {
                                $product_name = $row['plant'];
                                $product_amount = $row['amount'];
                                $product_price = $row['price'];
                                $product_color = $row['color'];
                                $total_price = $product_price * $quantity;
                                $cartTotal += $total_price;
                        ?>
                                <tr>
                                    <td>
                                        <a href="sisakasvit.php?id=<?= $item_id ?>">
                                            <?= $product_name . ", " . $product_color ?> (<?= $product_amount . " " . $traCommon['pieces'][$lang] ?>)
                                        </a>
                                    </td>
                                    <td>
                                        <?= number_format($product_price, 2) ?> &euro;
                                    </td>
                                    <td>
                                        <form action="ostoskori-paivita.php" method="post" class="reset no-padding update">
                                            <input type="number" name="quantity[<?= $item_id ?>]" value="<?= $quantity ?>" min="1" class="narrow" />
                                            <button type="submit" class="update-item tooltip below" data-tooltip="<?= $traCommon['cart_update'][$lang]; ?>">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="scr"><?= $traCommon['update'][$lang] ?></span>
                                            </button>
                                            <?= $product_amount > 1 ? "(" . $product_amount * $quantity . " " . $traCommon['pieces'][$lang] . ")" : ''  ?>
                                        </form>
                                    </td>
                                    <td>
                                        <?= number_format($total_price, 2) ?> &euro;
                                    </td>
                                    <td>
                                        <!-- <form action="ostoskori-poista.php" method="post" class="reset no-padding"> -->
                                        <input type="hidden" name="item_id" value="<?= $item_id ?>">
                                        <button type="submit" class="remove-item tooltip below left" data-tooltip="<?= $traCommon['remove'][$lang]; ?>" data-item-id="<?= $item_id ?>" data-item-name="<?= $product_name . ", " . $product_color; ?>" data-item-confirmation1="<?= $traCommon['confirm_remove_partial'][$lang] ?>" data-item-confirmation2="<?= $traCommon['cart_from'][$lang] ?>">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="scr"><?= $traCommon['remove'][$lang] . " " . $product_name . ", " . $product_color; ?></span>
                                        </button>
                                        <!-- </form> -->
                                    </td>
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
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

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

<script>
    const removeItemButtons = document.querySelectorAll('.remove-item');
    removeItemButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Get the item ID from the button's data attribute
            const itemID = this.getAttribute('data-item-id');
            // Get the item name from the button's data attribute
            const itemName = this.getAttribute('data-item-name');
            //
            const itemConfirm1 = this.getAttribute('data-item-confirmation1');
            const itemConfirm2 = this.getAttribute('data-item-confirmation2');
            // Display a confirmation dialog
            const confirmation = confirm(`${itemConfirm1} "${itemName}" ${itemConfirm2}?`);

            // If the user confirms, submit the form to remove the item
            if (confirmation) {
                const form = document.createElement('form');
                form.method = 'post';
                form.action = 'ostoskori-poista.php';
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'item_id';
                input.value = itemID;
                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
            }
        });
    });
</script>

<?php include "sivuosat/footer.php"; ?>