<?php
include "sivuosat/top.php";
$title = 'Yhteydenotto';
$script = 'lomake.js';
$css = 'styles-lomake.css';
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
// $img1920 = 'flower-3231083_1920.jpg';
include "sivuosat/header.php";

?>

<main class="yhteydenotto">
    <section>


        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($yhteys->connect_error) {
                debugger("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
                die("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
            }
            $yhteys->set_charset("utf8");

            // Capture form data
            $name = $yhteys->real_escape_string(strip_tags(trim($_POST['nimi'])));
            $email = $yhteys->real_escape_string(strip_tags(trim($_POST['sahkoposti'])));
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $phone = $yhteys->real_escape_string(strip_tags(trim($_POST['phone']))) ?? null;
            $subject = $yhteys->real_escape_string(strip_tags(trim($_POST['aihe'])));
            $message = $yhteys->real_escape_string(strip_tags(trim($_POST['viesti'])));
            $newsletter = $yhteys->real_escape_string($_POST['uutiskirje']) === "Kylla" ? 1 : 0;

            // Validate e-mail
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header('Location: yhteydenotto.php?message=' . urlencode("$email ei ole kelvollinen sähköpostiosoite."));
            } else {

                $insertQuery = "INSERT INTO neil_contact (name, email, phone, subject, message, newsletter)
                VALUES ('$name', '$email', '$phone', '$subject', '$message', '$newsletter')";

                if ($yhteys->query($insertQuery) === TRUE) {
                    echo "<p>Kiitos yhteydenotosta! Otamme yhteyttä mahdollisimman pian.</p>";
                } else {
                    debugger("Virhe yhteydenoton tallentamisessa: " . $yhteys->error);
                    echo "Virhe yhteydenoton tallentamisessa: " . $yhteys->error;
                }

                $yhteys->close();
            }
        }

        ?>

    </section>
</main>

<?php include "sivuosat/footer.php"; ?>