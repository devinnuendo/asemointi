<?php
$title = 'Sähköpostiosoitteen vahvistus';
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
// $img1920 = 'flower-3231083_1920.jpg';
include "db/db-azure.php";
include "sivuosat/header.php";

$verification = $email_already_verified = $activation_error = "";
$token = $_GET['token'] ?? "";
if ($token) {
    $token = $yhteys->real_escape_string(trim(strip_tags($token)));
    $query = "SELECT s.customer_id, s.verified, s.created FROM neil_signup_tokens s
             LEFT JOIN neil_user u ON u.customer_id = s.customer_id WHERE s.token = '$token'";
    $result = $yhteys->query($query);
    if ($result->num_rows) {
        list($id, $verified, $ika) = $result->fetch_row();
        if ($verified == 0) {
            $query = "UPDATE neil_user u SET verified = '1' WHERE u.customer_id = '$id'";
            $result = $yhteys->query($query);
            if ($result) {
                $verification =
                    '
                  Sähköpostiosoitteesi on vahvistettu. Tervetuloa ostoksille! 
                   <p><a href="kirjaudu.php">Kirjaudu sisään</a>
                   ';
            }
        } else {
            $email_already_verified =
                '
               Sähköpostiosoitteesi on jo vahvistettu. Tervetuloa ostoksille!
               <p><a href="kirjaudu.php">Kirjaudu sisään</a></p>
               ';
        }
        $query = "DELETE FROM neil_signup_tokens WHERE token = '$token'";
        $result = $yhteys->query($query);
        $poistettiin = $yhteys->affected_rows;
    } else {
        $activation_error =
            '
          Tapahtui virhe; sähköpostiosoitteesi saattaa olla jo vahvistettu. 
          <p><a href="kirjaudu.php">Kirjaudu sisään</a></p>';
    }
}
?>

<main>
    <section>

    </section>
</main>

<?php include "sivuosat/footer.php"; ?>