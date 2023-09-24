<?php
include "sivuosat/top.php";
$title = 'Toimitus';
$script = 'lomake.js';
$css = 'styles-lomake.css';
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
// $img1920 = 'flower-3231083_1920.jpg';
include "sivuosat/header.php";

?>

<main class="toimitus">
    <section>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($yhteys->connect_error) {
                debugger("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
                die("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
            }
            $yhteys->set_charset("utf8");

            // Capture form data
            $billing_name = $yhteys->real_escape_string(strip_tags(trim($_POST['billing_name'])));
            $billing_name = ucwords($billing_name, " ");
            $billing_street_address = $yhteys->real_escape_string(strip_tags(trim($_POST['billing_street_address'])));
            $billing_postal_code = $yhteys->real_escape_string(strip_tags(trim($_POST['billing_postal_code'])));
            $billing_city = $yhteys->real_escape_string(strip_tags(trim($_POST['billing_city'])));
            $billing_country = $yhteys->real_escape_string(strip_tags(trim($_POST['billing_country'])));
            $billing_phone = $yhteys->real_escape_string(strip_tags(trim($_POST['phone'])));
            $billing_phone = preg_replace('/\s+/u', '', $billing_phone); // Remove spaces
            $payment_method = $yhteys->real_escape_string(strip_tags(trim($_POST['payment_method'])));
            $card_number = $yhteys->real_escape_string(strip_tags(trim($_POST['card_number'])));
            $expiration_date = $yhteys->real_escape_string(strip_tags(trim($_POST['expiration_date'])));



            $insertQuery = "INSERT INTO neil_billing_address (billing_name, billing_street_address, billing_postal_code, billing_city, billing_country, billing_phone, payment_method, card_number, expiration_date)
        VALUES ('$billing_name', '$billing_street_address', '$billing_postal_code', '$billing_city', '$billing_country', '$billing_phone', '$payment_method', '$card_number', '$expiration_date')";

            if ($yhteys->query($insertQuery) === TRUE) {
                $address_id = $yhteys->insert_id;
                echo "<p>Laskutusosoite tallennettu onnistuneesti!</p>";
            } else {
                debugger("Virhe laskutusosoitteen tallentamisessa: " . $yhteys->error);
                echo "Virhe laskutusosoitteen tallentamisessa: " . $yhteys->error;
            }

            $yhteys->close();
        }
        ?>

    </section>
</main>

<?php include "sivuosat/footer.php"; ?>