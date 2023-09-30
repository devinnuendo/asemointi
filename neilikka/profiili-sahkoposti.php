<?php
include "sivuosat/top.php";
$title = $traCommon['new'][$lang] . " " . strtolower($traCommon['email'][$lang]);
$script = 'lomake.js';
$css = 'styles-lomake.css';
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
$loggedIn = secure_page(1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($yhteys->connect_error) {
        debugger("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
        die($traCommon['connection_failed'][$lang] . ": " . $yhteys->connect_error);
    } else {
        $yhteys->set_charset("utf8");

        $customer_id = $_SESSION['customer_id'];
        $email = $yhteys->real_escape_string(strip_tags(trim($_POST['email'])));
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];

        $query = "SELECT password FROM neil_user WHERE customer_id = $customer_id";
        $result = $yhteys->query($query);
        if ($result) {
            $row = $result->fetch_assoc();
            $hash = $row['password'];
            $verifyPassword = password_verify($password, $hash);
            if (!$verifyPassword) $errors['password'] = $traCommon['password_wrong'][$lang];
            if ($verifyPassword) {
                $id = $_SESSION['customer_id'];
                $token = md5(rand() . time());
                $timestamp = date('Y-m-d H:i:s');
                $query =   "INSERT INTO neil_email_change_tokens (customer_id, token, created) 
                            VALUES ($id,'$token', $timestamp)";
                $result = $yhteys->query($query);
                $lisattiin_token = $yhteys->affected_rows;
                if ($lisattiin_token) {
                    $email_sender_name = "Puutarhaliike Neilikka";
                    $email_sender_email = "$email_admin";
                    $email_recipient_name = "$first_name $last_name";
                    $email_recipient_email = $email;
                    $email_title = "{$traLocal['email_change_neilikka'][$lang]}, $first_name!";
                    $email_body =  "<html>
                                    <body>
                                        <h1>{$traLocal['email_change_neilikka'][$lang]}</h1>
                                        <p>{$traCommon['hello'][$lang]} $email_recipient_name, <br /><br />{$traCommon['username_new_is'][$lang]} \"$email\". <br /><br />{$traCommon['email_confirm_from_link_below'][$lang]}: <br><br> <a href='$verkkosivu/$kansio/vahvistus-sahkoposti.php?token=$token'>{$traCommon['email_confirm'][$lang]}</a> <br /><br />{$traCommon['regards'][$lang]}, <br />{$traLocal['staff_neilikka'][$lang]}</p>
                                    </body>
                                    </html>";

                    try {
                        $lahetetty = posti($email_recipient_name, $email_recipient_email, $email_sender_name, $email_sender_email, $email_title, $email_body);

                        if ($lahetetty) {
                            echo   "<p>{$traLocal['email_change_neilikka'][$lang]}!</p>
                                <p>{$traCommon['username_new_is'][$lang]} \"$email\". </p>
                                <p>{$traCommon['email_confirm_click_email_link'][$lang]}.</p>
                                ";
                        } else {
                            echo $traCommon['error_register'][$lang];
                        }

                        $yhteys->close();
                    } catch (Exception $e) {
                        echo $traCommon['error_register'][$lang];
                        debugger('Virhe rekisteröinnissä: ', $e->getMessage(), PHP_EOL);
                    }
                }
            } else {
                $errors['password'] = $traCommon['password_wrong'][$lang];
            }
        } else {
            $errors['password'] = $traCommon['password_wrong'][$lang];
        }
    }
}

include "sivuosat/header.php";
?>

<main class="image">
    <section>

        <?php include "sivuosat/form_language.php" ?>

        <form autocomplete="off" method="post" id="form-email" class="form-email">
            <legend class="scr">
                <?= $traCommon['edit'][$lang]; ?>
            </legend>

            <div class="flex">
                <label for="email">
                    <?= $traCommon['email'][$lang]; ?>
                </label>
                <input type="text" name="email" id="email" minlength="2" placeholder="<?= $traCommon['new'][$lang] . " " . strtolower($traCommon['email'][$lang]); ?>" required />
                <div class="error"></div>

                <label for="password">
                    Neilikka <?= $traCommon['password'][$lang]; ?>
                </label>
                <input type="password" name="password" id="password" placeholder="Neilikka <?= $traCommon['password'][$lang]; ?>" <?= pattern('password'); ?> minlength="10" required />
                <div class="error <?= $errors['password'] ? 'block' : ''; ?>">
                    <?= $errors['password'] ?? ''; ?>
                </div>
            </div>

            <button type="submit">
                <?= $traCommon['submit'][$lang]; ?>
            </button>
        </form>

    </section>
</main>

<?php include "sivuosat/footer.php"; ?>