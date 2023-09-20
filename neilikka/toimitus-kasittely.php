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

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($yhteys->connect_error) {
                die("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
            }
            $yhteys->set_charset("utf8");

            // Capture form data
            $recipient_name = $yhteys->real_escape_string(strip_tags(trim($_POST['recipient_name'])));
            $recipient_name = ucwords($recipient_name, " ");
            $street_address = $yhteys->real_escape_string(strip_tags(trim($_POST['street_address'])));
            $postal_code = $yhteys->real_escape_string(strip_tags(trim($_POST['postal_code'])));
            $city = $yhteys->real_escape_string(strip_tags(trim($_POST['city'])));
            $country = $yhteys->real_escape_string(strip_tags(trim($_POST['country'])));
            $phone = $yhteys->real_escape_string(strip_tags(trim($_POST['phone'])));
            $phone = preg_replace('/\s+/u', '', $phone); // Remove spaces
            $payment_method = $yhteys->real_escape_string(strip_tags(trim($_POST['payment_method'])));
            $card_number = $yhteys->real_escape_string(strip_tags(trim($_POST['card_number'])));
            $expiration_date = $yhteys->real_escape_string(strip_tags(trim($_POST['expiration_date'])));



            $insertQuery = "INSERT INTO neil_delivery_address (recipient_name, street_address, postal_code, city, country, phone, payment_method, card_number, expiration_date)
        VALUES ('$recipient_name', '$street_address', '$postal_code', '$city', '$country', '$phone', '$payment_method', '$card_number', '$expiration_date')";

            if ($yhteys->query($insertQuery) === TRUE) {
                $address_id = $yhteys->insert_id;
                echo "<p>Toimitusosoite tallennettu onnistuneesti!</p>";
            } else {
                echo "Virhe toimitusosoitteen tallentamisessa: " . $yhteys->error;
            }

            $yhteys->close();
        }
        ?>

    </section>
</main>

<?php include "sivuosat/footer.php"; ?>