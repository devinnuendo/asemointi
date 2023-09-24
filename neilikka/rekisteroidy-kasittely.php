<?php
include "sivuosat/top.php";
$title = 'Rekisteröidy';
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
// $img1920 = 'flower-3231083_1920.jpg';
include "sivuosat/header.php";
include "db/db-azure.php";
include "../config/posti.php";
?>

<main class="rekisteroidy">
    <section>
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if ($yhteys->connect_error) {
                debugger("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
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

                            $id = $yhteys->insert_id;
                            $token = md5(rand() . time());
                            $query = "INSERT INTO neil_signup_tokens (customer_id, token) VALUES ($id,'$token')";
                            $result = $yhteys->query($query);
                            $lisattiin_token = $yhteys->affected_rows;

                            // Lähetä uudelle käyttäjälle sähköposti

                            if ($lisattiin_token) {

                                $email_sender_name = "Puutarhaliike Neilikka";
                                $email_sender_email = "jenniina@jenniina.fi";
                                $email_recipient_name = "$first_name $last_name";
                                $email_recipient_email = $email;
                                $email_title = "Tervetuloa Neilikkaan, $first_name!";
                                $email_body = "<html><body><h1>Kiitos rekisteröitymisestä Neilikan verkkokauppaan!</h1><p>Hei $email_recipient_name,<br /><br />Kiitos rekisteröitymisestä Neilikan verkkokauppaan! <br /><br />Käyttäjätunnuksesi on \"$email\" ja asiakasnumerosi on \"$customer_id\".<br /><br />Vahvista sähköpostiosoitteesi alla olevasta linkistä:<br><br> <a href='$verkkosivu/$kansio/vahvistus.php?token=$token'>Vahvista sähköpostiosoitteesi tästä</a><br /><br />Ystävällisin terveisin,<br />Neilikan henkilökunta</p></body></html>";

                                try {
                                    $lahetetty = posti($email_recipient_name, $email_recipient_email, $email_sender_name, $email_sender_email,  $email_title, $email_body);

                                    if ($lahetetty) {
                                        echo "<p>Kiitos rekisteröitymisestä Neilikan verkkokauppaan!</p>
                                <p>Käyttäjätunnuksesi on \"$email\" ja asiakasnumerosi on \"$customer_id\". </p>
                                <p>Klikkaa vielä sähköpostiisi saapunutta linkkiä vahvistaaksesi sähköpostisi.</p>
                                ";
                                    } else {
                                        echo "Virhe rekisteröitymisessä: $yhteys->error";
                                    }

                                    $yhteys->close();
                                } catch (Exception $e) {
                                    echo 'Virhe lähetyksessä: ', $e->getMessage(), PHP_EOL;
                                }
                            }
                        } else {
                            debugger("Virhe rekisteröitymisessä: " . $yhteys->error);
                            echo "Virhe rekisteröitymisessä: $yhteys->error";
                        }
                    }
                }
            }
        };
        ?>

    </section>
</main>

<?php include "sivuosat/footer.php"; ?>