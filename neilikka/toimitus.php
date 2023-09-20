<?php
$title = 'Toimitus';
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

        <form method="post" action="toimitus-kasittely.php" id="delivery-address-form">
            <legend class="scr">Toimitusosoite</legend>
            <label for="recipient_name">Vastaanottajan nimi</label>
            <input type="text" name="recipient_name" id="recipient_name" placeholder="Vastaanottajan nimi" autocomplete="name" minlength="2" required />
            <div class="error"></div>

            <label for="street_address">Katuosoite</label>
            <input type="text" name="street_address" id="street_address" placeholder="Katuosoite" autocomplete="street-address" minlength="5" required />
            <div class="error"></div>

            <label for="postal_code">Postinumero</label>
            <input type="text" name="postal_code" id="postal_code" placeholder="Postinumero" autocomplete="postal-code" minlength="5" maxlength="10" required />
            <div class="error"></div>

            <label for="city">Kaupunki</label>
            <input type="text" name="city" id="city" placeholder="Kaupunki" autocomplete="address-level2" minlength="2" required />
            <div class="error"></div>

            <label for="country">Maa</label>
            <input type="text" name="country" id="country" value="Finland" readonly />
            <div class="error"></div>

            <label for="phone">Puhelinnumero</label>
            <input type="tel" name="phone" id="phone" placeholder="Puhelinnumero" autocomplete="tel" minlength="7" maxlength="15" pattern="^[0-9 ]{7,15}$" required />
            <div class="error"></div>
            <div>
                <input type="checkbox" name="terms" id="terms" value="ok" required />
                <label for="terms" class="inline-block">Olen lukenut ja hyväksyn sivuston käyttösäännöt</label>
                <div class="error"></div>
            </div>
            <input type="submit" value="Tallenna toimitusosoite">
        </form>

</main>

<?php include "sivuosat/footer.php"; ?>