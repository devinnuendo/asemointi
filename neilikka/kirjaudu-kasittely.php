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

    $query = "SELECT customer_id, email, password, verified, admin FROM neil_user WHERE email = '$email'";
    $result = $yhteys->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        $hash = $row['password'];
        $customer_id = $row['customer_id'];
        $verified = $row['verified'];
        $admin = $row['admin'];

        $verifyPassword = password_verify($password, $hash);

        if ($verifyPassword && $verified == 1) {
            if (!session_id()) session_start();
            $_SESSION["loggedIn"] = true;
            $loggedIn = loggedIn();
            $_SESSION['customer_id'] = $customer_id;
            if ($rememberme) rememberme($customer_id);
            if ($admin == 1) {
                $_SESSION['admin'] = true;
                header("Location: admin.php");
                exit;
            } else {
                $_SESSION['admin'] = false;
                header("Location: index.php");
                exit;
            }
        } else if ($verifyPassword && $verified == 0) {

            $title = 'Tilin aktivointi';
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