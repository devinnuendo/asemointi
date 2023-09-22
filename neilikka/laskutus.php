<?php
$title = 'Laskutus';
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

        <form method="post" action="laskutus-kasittely.php" id="billing-address-form">
            <legend class="scr"><?= $tra['billing_address']; ?></legend>
            <label for="billing_name"><?= $tra['name']; ?></label>
            <input type="text" name="billing_name" id="billing_name" placeholder="<?= $tra['name']; ?>" autocomplete="name" minlength="2" required />
            <div class="error"></div>

            <label for="billing_street_address"><?= $tra['billing_address']; ?></label>
            <input type="text" name="billing_street_address" id="billing_street_address" placeholder="<?= $tra['billing_address']; ?>" autocomplete="street-address" minlength="5" required />
            <div class="error"></div>

            <label for="billing_postal_code"><?= $tra['postal_code']; ?></label>
            <input type="text" name="billing_postal_code" id="billing_postal_code" placeholder="<?= $tra['postal_code']; ?>" autocomplete="postal-code" minlength="5" maxlength="10" pattern="^[0-9]{5}(-[0-9]{4})?$" required />
            <div class="error"></div>

            <label for="billing_city"><?= $tra['city']; ?></label>
            <input type="text" name="billing_city" id="billing_city" placeholder="<?= $tra['city']; ?>" autocomplete="address-level2" minlength="2" required />
            <div class="error"></div>

            <label for="billing_country"><?= $tra['country']; ?></label>
            <input type="text" name="billing_country" id="billing_country" value="Finland" />
            <div class="error"></div>

            <label for="phone"><?= $tra['phone']; ?></label>
            <input type="tel" name="phone" id="phone" placeholder="<?= $tra['phone']; ?>" autocomplete="tel" minlength="7" maxlength="15" pattern="^[0-9 ]{7,15}$" required />
            <div class="error"></div>

            <label for="payment_method"><?= $tra['payment_method']; ?></label>
            <select name="payment_method" id="payment_method" required>
                <option value=""><?= $tra['payment_method_choose']; ?></option>
                <option value="credit_card"><?= $tra['payment_method_card']; ?></option>
                <option value="paypal">PayPal</option>
                <option value="<?= $tra['payment_method_invoice']; ?>"></option>
            </select>
            <div class="error"></div>

            <label for="card_number"><?= $tra['card_number']; ?></label>
            <input type="text" name="card_number" id="card_number" placeholder="<?= $tra['card_number']; ?>" autocomplete="cc-number" pattern="^4[0-9]{12}(?:[0-9]{3})?$" required />
            <div class="error"></div>

            <label for="expiration_date"><?= $tra['expiration_date']; ?> (<?= $tra['expiration_date_type']; ?>)</label>
            <input type="text" name="expiration_date" id="expiration_date" placeholder="<?= $tra['expiration_date_type']; ?>" autocomplete="cc-exp" pattern="^(0[1-9]|1[0-2])\/[0-9]{2}$" required />
            <div class="error"></div>

            <div>
                <input type="checkbox" name="terms" id="terms" value="ok" required />
                <label for="terms" class="inline-block"><?= $tra['terms']; ?></label>
                <div class="error"></div>
            </div>

            <button type="submit"><?= $tra['submit']; ?></button>
        </form>

</main>

<?php include "sivuosat/footer.php"; ?>