<?php
include "sivuosat/top.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($yhteys->connect_error) {
        debugger("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
        die($traCommon['connection_failed'][$lang] . ": " . $yhteys->connect_error);
    }
    $yhteys->set_charset("utf8");


    // Tiedot lomakkeesta 
    $email = $yhteys->real_escape_string($_POST['email']);
    $password = $yhteys->real_escape_string($_POST['password']);
    if (isset($_POST['remember_me']))
        $rememberme =  $yhteys->real_escape_string($_POST['remember_me']);
    else $rememberme = "";

    $query = "SELECT customer_id, email, password, verified, role, value FROM neil_user 
    LEFT JOIN neil_roles r ON role = r.id
    WHERE email = '$email'";
    $result = $yhteys->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        $hash = $row['password'];
        $customer_id = $row['customer_id'];
        $verified = $row['verified'];
        $role = $row['value'];

        $verifyPassword = password_verify($password, $hash);

        if ($verifyPassword && $verified == 1) {
            if (!session_id()) session_start();
            $_SESSION['loggedIn'] = $role;
            $loggedIn = loggedIn();
            $_SESSION['customer_id'] = $customer_id;
            if ($rememberme) rememberme($customer_id);
            switch ($loggedIn) {
                case 4:
                case 8:
                    header("location: kayttajat.php");
                    break;
                case 16:
                    header("location: admin.php");
                    break;
                default:
                    header("location: profiili.php");
            }
        } else if ($verifyPassword && $verified == 0) {

            $title = $traCommon['account_activation'][$lang];
            include "sivuosat/header.php";
?>

            <main class="kirjaudu">
                <section>
                    <?php
                    echo "<p>{$traCommon['error_not_activated'][$lang]}</p>
                    <p><a href='index.php'>{$traCommon['frontpage'][$lang]}</a></p>
                    ";
                    ?>

                </section>
            </main>

<?php include "sivuosat/footer.php";
        } else {
            header('Location: kirjaudu.php?message=' . urlencode($traCommon['credentials_wrong'][$lang]));
            exit;
        }
    } else {
        debugger("Virhe kirjautumisessa: $yhteys->error");
        header('Location: kirjaudu.php?message=' . urlencode($traCommon['error_login'][$lang]));
        exit;
    }

    $yhteys->close();
};
?>