<?php
$title = 'Kiitos kirjautumisesta';
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
// $img1920 = 'flower-3231083_1920.jpg';
include "sivuosat/header.php";
include "db/db-azure.php";
?>

<main class="kirjaudu">
    <section>
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if ($yhteys->connect_error) {
                die("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
            }
            $yhteys->set_charset("utf8");


            // Tiedot lomakkeesta 
            $email = $yhteys->real_escape_string($_POST['email']);
            $password = $yhteys->real_escape_string($_POST['password']);

            $query = "SELECT password FROM neil_user WHERE email = '$email'";
            $result = $yhteys->query($query);

            if ($result) {
                $row = $result->fetch_assoc();
                $hash = $row['password'];

                $verify = password_verify($password, $hash);

                if ($verify) {
                    echo "<p>Kirjautuminen onnistui!</p>
                    <p><a href='index.php'>Etusivulle</a></p>";
                } else {
                    echo "<p>Kirjautuminen epäonnistui</p>
                    <p><a href='javascript:history.go(-1)'>Takaisin</a></p>";
                }
            } else {
                echo "Virhe kirjautumisessa: $yhteys->error";
            }

            $yhteys->close();
        };
        ?>

    </section>
</main>

<?php include "sivuosat/footer.php"; ?>