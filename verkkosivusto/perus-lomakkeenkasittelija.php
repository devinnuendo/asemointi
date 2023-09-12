<!DOCTYPE html>
<html lang="fi">

<head>
    <meta charset="UTF-8">
    <title>Lomakkeen Käsittelijä</title>
</head>

<body>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Tarkistetaan, että pakolliset kentät on täytetty
        if (isset($_POST["nimi"]) && isset($_POST["sahkoposti"]) && isset($_POST["salasana"])) {
            $nimi = $_POST["nimi"];
            $sahkoposti = $_POST["sahkoposti"];
            $salasana = $_POST["salasana"];

            // Tulostetaan lomakkeen tiedot
            echo "<h1>Rekisteröitymisen tiedot:</h1>";
            echo "<p>Nimi: $nimi</p>";
            echo "<p>Sähköposti: $sahkoposti</p>";
            echo "<p>Salasana: $salasana</p>";

            // Tarkistetaan, onko sukupuoli valittu
            if (isset($_POST["sukupuoli"])) {
                $sukupuoli = $_POST["sukupuoli"];
                echo "<p>Sukupuoli: $sukupuoli</p>";
            }

            // Tarkistetaan, onko maakunta valittu
            if (isset($_POST["maakunta"])) {
                $maakunta = $_POST["maakunta"];
                echo "<p>Maakunta: $maakunta</p>";
            }

            // Tarkistetaan, onko lemmikit valittu
            if (isset($_POST["lemmikit"])) {
                $lemmikit = $_POST["lemmikit"];
                echo "<p>Lemmikit: " . implode(", ", $lemmikit) . "</p>";
            }

            // Tarkistetaan, onko kuvaus annettu
            if (isset($_POST["kuvaus"])) {
                $kuvaus = $_POST["kuvaus"];
                echo "<p>Kuvaus: $kuvaus</p>";
            }

            // Tarkistetaan, onko osasto (piilokenttä) asetettu
            if (isset($_POST["osasto"])) {
                $osasto = $_POST["osasto"];
                echo "<p>Osasto: $osasto</p>";
            }
        } else {
            echo "<p>Pakolliset kentät (Nimi, Sähköposti, Salasana) tulee täyttää!</p>";
        }
    }
    ?>

</body>

</html>