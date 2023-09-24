<?php
include "sivuosat/top.php";
$title = $traCommon['address_billing'][$lang];
$script = 'lomake.js';
$css = 'styles-lomake.css';
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
// $img1920 = 'flower-3231083_1920.jpg';
include "sivuosat/header.php";
include "db/db-azure.php";
?>

<main class="laskutus">
    <section>

        <?php include "sivuosat/form_language.php" ?>

        <form autocomplete="on" method="post" action="laskutus-kasittely.php" id="billing-address-form">
            <legend class="scr"><?= $traCommon['address_billing'][$lang]; ?></legend>
            <label for="billing_name"><?= $traCommon['name'][$lang]; ?></label>
            <input type="text" name="billing_name" id="billing_name" placeholder="<?= $traCommon['name'][$lang]; ?>" autocomplete="name" minlength="2" required />
            <div class="error"></div>

            <label for="billing_street_address"><?= $traCommon['address_billing'][$lang]; ?></label>
            <input type="text" name="billing_street_address" id="billing_street_address" placeholder="<?= $traCommon['address_billing'][$lang]; ?>" autocomplete="street-address" minlength="5" required />
            <div class="error"></div>

            <label for="billing_postal_code"><?= $traCommon['postal_code'][$lang]; ?></label>
            <input type="text" name="billing_postal_code" id="billing_postal_code" placeholder="<?= $traCommon['postal_code'][$lang]; ?>" autocomplete="postal-code" minlength="5" maxlength="10" pattern="^[0-9]{5}(-[0-9]{4})?$" required />
            <div class="error"></div>

            <label for="billing_city"><?= $traCommon['city'][$lang]; ?></label>
            <input type="text" name="billing_city" id="billing_city" placeholder="<?= $traCommon['city'][$lang]; ?>" autocomplete="address-level2" minlength="2" required />
            <div class="error"></div>

            <label for="billing_country"><?= $traCommon['country'][$lang]; ?></label>
            <input type="text" name="billing_country" id="billing_country" value="Finland" />
            <div class="error"></div>

            <label for="phone"><?= $traCommon['phone'][$lang]; ?></label>
            <input type="tel" name="phone" id="phone" placeholder="<?= $traCommon['phone'][$lang]; ?>" autocomplete="tel" minlength="7" maxlength="15" pattern="^[0-9 ]{7,15}$" required />
            <div class="error"></div>

            <label for="payment_method"><?= $traCommon['payment_method'][$lang]; ?></label>
            <select name="payment_method" id="payment_method" required>
                <option value=""><?= $traCommon['payment_method_choose'][$lang]; ?></option>
                <option value="credit_card"><?= $traCommon['payment_method_card'][$lang]; ?></option>
                <option value="paypal">PayPal</option>
                <option value="<?= $traCommon['payment_method_invoice'][$lang]; ?>"></option>
            </select>
            <div class="error"></div>

            <label for="card_number"><?= $traCommon['card_number'][$lang]; ?></label>
            <input type="text" name="card_number" id="card_number" placeholder="<?= $traCommon['card_number'][$lang]; ?>" autocomplete="cc-number" pattern="^4[0-9]{12}(?:[0-9]{3})?$" required />
            <div class="error"></div>

            <label for="expiration_date"><?= $traCommon['expiration_date'][$lang]; ?> (<?= $traCommon['expiration_date_type'][$lang]; ?>)</label>
            <input type="text" name="expiration_date" id="expiration_date" placeholder="<?= $traCommon['expiration_date_type'][$lang]; ?>" autocomplete="cc-exp" pattern="^(0[1-9]|1[0-2])\/[0-9]{2}$" required />
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