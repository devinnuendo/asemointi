<?php
$title = 'Yhteydenotto';
$script = 'lomake.js';
$css = 'styles-lomake.css';
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
// $img1920 = 'flower-3231083_1920.jpg';
include "sivuosat/header.php";
include "db/db-azure.php";
?>

<main class="yhteydenotto">
    <section>


        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($yhteys->connect_error) {
                die("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
            }
            $yhteys->set_charset("utf8");

            // Capture form data
            $name = $yhteys->real_escape_string(strip_tags(trim($_POST['nimi'])));
            $email = $yhteys->real_escape_string(strip_tags(trim($_POST['sahkoposti'])));
            $phone = $yhteys->real_escape_string(strip_tags(trim($_POST['phone']))) ?? null;
            $subject = $yhteys->real_escape_string(strip_tags(trim($_POST['aihe'])));
            $message = $yhteys->real_escape_string(strip_tags(trim($_POST['viesti'])));
            $newsletter = $yhteys->real_escape_string($_POST['uutiskirje']) === "Kylla" ? 1 : 0;

            $insertQuery = "INSERT INTO neil_contact (name, email, phone, subject, message, newsletter)
                VALUES ('$name', '$email', '$phone', '$subject', '$message', '$newsletter')";

            if ($yhteys->query($insertQuery) === TRUE) {
                echo "<p>Kiitos yhteydenotosta! Otamme yhteyttä mahdollisimman pian.</p>";
            } else {
                echo "Virhe yhteydenoton tallentamisessa: " . $yhteys->error;
            }

            $yhteys->close();
        }
        ?>

    </section>
</main>

<?php include "sivuosat/footer.php"; ?>