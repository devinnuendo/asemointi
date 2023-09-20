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

        <form method="post" action="laskutus-kasittely.php" id="billing-address-form">
            <legend class="scr">Laskutusosoite</legend>
            <label for="billing_name">Laskutuksen saaja</label>
            <input type="text" name="billing_name" id="billing_name" placeholder="Laskutuksen saaja" autocomplete="name" minlength="2" required />
            <div class="error"></div>

            <label for="billing_street_address">Laskutusosoite</label>
            <input type="text" name="billing_street_address" id="billing_street_address" placeholder="Laskutusosoite" autocomplete="street-address" minlength="5" required />
            <div class="error"></div>

            <label for="billing_postal_code">Postinumero</label>
            <input type="text" name="billing_postal_code" id="billing_postal_code" placeholder="Postinumero" autocomplete="postal-code" minlength="5" maxlength="10" pattern="^[0-9]{5}(-[0-9]{4})?$" required />
            <div class="error"></div>

            <label for="billing_city">Kaupunki</label>
            <input type="text" name="billing_city" id="billing_city" placeholder="Kaupunki" autocomplete="address-level2" minlength="2" required />
            <div class="error"></div>

            <label for="billing_country">Maa</label>
            <input type="text" name="billing_country" id="billing_country" value="Finland" readonly />
            <div class="error"></div>

            <label for="phone">Puhelinnumero</label>
            <input type="tel" name="phone" id="phone" placeholder="Puhelinnumero" autocomplete="tel" minlength="7" maxlength="15" pattern="^[0-9 ]{7,15}$" required />
            <div class="error"></div>

            <label for="payment_method">Maksutapa</label>
            <select name="payment_method" id="payment_method" required>
                <option value="">Valitse maksutapa</option>
                <option value="credit_card">Luottokortti</option>
                <option value="paypal">PayPal</option>
            </select>
            <div class="error"></div>

            <label for="card_number">Kortin numero</label>
            <input type="text" name="card_number" id="card_number" placeholder="Kortin numero" autocomplete="cc-number" pattern="^4[0-9]{12}(?:[0-9]{3})?$" required />
            <div class="error"></div>

            <label for="expiration_date">Kortin voimassaoloaika (KK/VV)</label>
            <input type="text" name="expiration_date" id="expiration_date" placeholder="KK/VV" autocomplete="cc-exp" pattern="^(0[1-9]|1[0-2])\/[0-9]{2}$" required />
            <div class="error"></div>

            <input type="checkbox" name="terms" id="terms" value="ok" required />
            <label for="terms" class="inline-block">Olen lukenut ja hyväksyn sivuston käyttösäännöt</label>
            <div class="error"></div>

            <input type="submit" value="Tallenna laskutusosoite">
        </form>

</main>

<?php include "sivuosat/footer.php"; ?>