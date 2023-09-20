<?php
$title = 'Rekisteröidy';
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
// $img1920 = 'flower-3231083_1920.jpg';
include "sivuosat/header.php";
include "db/db-azure.php";
?>

<main class="rekisteroidy">
    <section>
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if ($yhteys->connect_error) {
                die("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
            }
            $yhteys->set_charset("utf8");


            // Tiedot lomakkeesta
            $first_name = $yhteys->real_escape_string(strip_tags(trim($_POST['first_name'])));
            $first_name = ucwords($first_name, " ");
            $last_name = $yhteys->real_escape_string(strip_tags(trim($_POST['last_name'])));
            $last_name = ucwords($last_name, " ");
            $phone = $yhteys->real_escape_string(strip_tags(trim($_POST['phone'])));
            $phone = preg_replace('/\s+/u', '', $phone); // remove spaces
            $email = $yhteys->real_escape_string(strip_tags(trim($_POST['email'])));
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];
            $password = password_hash($password, PASSWORD_BCRYPT);
            $newsletter = $yhteys->real_escape_string($_POST['newsletter']) === "Kylla" ? 1 : 0;
            // $terms = $yhteys->real_escape_string(strip_tags(trim($_POST['terms'])));

            // Validate e-mail
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header('Location: rekisteroidy.php?message=' . urlencode("$email ei ole kelvollinen sähköpostiosoite."));
            } else {

                $duplicateCheckQuery = "SELECT COUNT(*) AS duplicate_count FROM neil_user 
            WHERE TRIM(email) = TRIM('$email')";
                $result = $yhteys->query($duplicateCheckQuery);

                if ($result) {
                    $row = $result->fetch_assoc();
                    $duplicateCount = $row['duplicate_count'];

                    if ($duplicateCount > 0) {
                        // Duplicate found, display an error message
                        echo "<p>Tili tällä sähköpostilla on jo olemassa</p> 
                    <p><a href='javascript:history.go(-1)'>Takaisin</a></p>
                    <p><a href='kirjaudu.php'>Kirjaudu sisään</a></p>";
                    } else {
                        // Lisää asiakas taulukkoon 'neil_user'
                        $lisayskysely = "INSERT INTO neil_user (first_name, last_name, phone, email, password, newsletter, registration, updated)
                        VALUES ('$first_name', '$last_name', '$phone', '$email', '$password', $newsletter, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";

                        if ($yhteys->query($lisayskysely) === TRUE) {
                            $customer_id = $yhteys->insert_id;

                            echo "<p>Kiitos rekisteröitymisestä!</p>
                        <p>Käyttäjätunnuksesi on \"$email\" ja asiakasnumerosi on \"$customer_id\".</p>
                        <p><a href='kirjaudu.php'>Kirjaudu sisään</a></p>";
                        } else {
                            echo "Virhe rekisteröitymisessä: $yhteys->error";
                        }

                        $yhteys->close();
                    }
                } else {
                    // Error during duplicate check
                    $errorMessage = "Error checking for duplicates: " . $yhteys->error;
                }
            }
        };
        ?>

    </section>
</main>

<?php include "sivuosat/footer.php"; ?>