<?php
include "sivuosat/top.php";
$title = $traCommon['address_delivery'][$lang];
$script = 'lomake.js';
$css = 'styles-lomake.css';
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
// $img1920 = 'flower-3231083_1920.jpg';
include "sivuosat/header.php";
include "db/db-azure.php";
?>

<main class="toimitus">
    <section>

        <?php include "sivuosat/form_language.php" ?>

        <form autocomplete="on" method="post" action="toimitus-kasittely.php" id="delivery-address-form">
            <legend class="scr"><?= $traCommon['address'][$lang]; ?></legend>
            <label for="recipient_name"><?= $traCommon['name_recipient'][$lang]; ?></label>
            <input type="text" name="recipient_name" id="recipient_name" placeholder="<?= $traCommon['name_recipient'][$lang]; ?>" autocomplete="name" minlength="2" required />
            <div class="error"></div>

            <label for="street_address"><?= $traCommon['address'][$lang]; ?></label>
            <input type="text" name="street_address" id="street_address" placeholder="<?= $traCommon['address'][$lang]; ?>" autocomplete="street-address" minlength="5" required />
            <div class="error"></div>

            <label for="postal_code"><?= $traCommon['postal_code'][$lang]; ?></label>
            <input type="text" name="postal_code" id="postal_code" placeholder="<?= $traCommon['postal_code'][$lang]; ?>" autocomplete="postal-code" minlength="5" maxlength="10" required />
            <div class="error"></div>

            <label for="city"><?= $traCommon['city'][$lang]; ?></label>
            <input type="text" name="city" id="city" placeholder="<?= $traCommon['city'][$lang]; ?>" autocomplete="address-level2" minlength="2" required />
            <div class="error"></div>

            <label for="country"><?= $traCommon['country'][$lang]; ?></label>
            <input type="text" name="country" id="country" value="Finland" />
            <div class="error"></div>

            <label for="phone"><?= $traCommon['phone'][$lang]; ?></label>
            <input type="tel" name="phone" id="phone" placeholder="<?= $traCommon['phone'][$lang]; ?>" autocomplete="tel" minlength="7" maxlength="15" pattern="^[0-9 ]{7,15}$" required />
            <div class="error"></div>
            <div>
                <input type="checkbox" name="terms" id="terms" value="ok" required />
                <label for="terms" class="inline-block"><?= $traCommon['terms'][$lang]; ?></label>
                <div class="error"></div>
            </div>
            <button type="submit"><?= $traCommon['submit'][$lang]; ?></button>
        </form>

</main>

<?php include "sivuosat/footer.php"; ?>