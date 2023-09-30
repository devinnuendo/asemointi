<?php
include "sivuosat/top.php";
$title = $traCommon['change'][$lang] . " " . strtolower($traCommon['password'][$lang]);
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
$script = 'lomake.js';
$css = 'styles-lomake.css';
include "sivuosat/header.php";
?>

<main>
    <section>

        <?php
        function formPassword()
        {
            global $traCommon, $lang;
        ?>
            <form method="post">

                <label for="password_old"><?= $traCommon['password_old'][$lang]; ?></label>
                <input type="password" name="password_old" id="password_old" placeholder="<?= $traCommon['password_old'][$lang]; ?>" minlength="10" required />
                <div class="error"></div>

                <label for="password"><?= $traCommon['password_wanted'][$lang]; ?></label>
                <input type="password" name="password" id="password" placeholder="<?= $traCommon['password_wanted'][$lang]; ?>" autocomplete="new-password" minlength="10" required />
                <div class="error"></div>

                <label for="password2"><?= $traCommon['password_again'][$lang]; ?></label>
                <input type="password" name="password2" id="password2" placeholder="<?= $traCommon['password_again'][$lang]; ?>" autocomplete="new-password" minlength="10" required />
                <div class="error"></div>
                <div class="error password-match" aria-role="alert"></div>

                <button type="submit"> <?= $traCommon['submit'][$lang] ?> </button>
            </form>
        <?php
        }
        $token = $_GET['token'] ?? "";
        $success = false;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $password_old = $yhteys->real_escape_string($_POST['password_old']);
            $password = $yhteys->real_escape_string($_POST['password']);
            $password = password_hash($password, PASSWORD_BCRYPT);
            $password2 = $yhteys->real_escape_string($_POST['password2']);
            $password2 = password_hash($password, PASSWORD_BCRYPT);

            if ($_POST['password'] != $_POST['password2']) {
                $message_type = "error";
                $sent_message = $traCommon['passwords_dont_match'][$lang];
            } else {

                $query_hash =  "SELECT customer_id, token, valid_until 
                                FROM neil_reset_password_tokens r 
                                WHERE r.token = '$token'";
                $result_hash = $yhteys->query($query_hash);

                if ($result_hash->num_rows) {
                    $row_hash = $result_hash->fetch_assoc();
                    $valid_until = $row_hash['valid_until'];
                    $customer_id = $row_hash['customer_id'];
                    $valid_until = strtotime($valid_until);
                    $now = time();
                    if ($now > $valid_until) {
                        $message_type = "error";
                        $sent_message = $traCommon['link_expired'][$lang];
                    } else {
                        $query =   "SELECT password, verified FROM neil_user 
                                    WHERE customer_id = '$customer_id'";
                        $result = $yhteys->query($query);

                        if ($result) {
                            $row = $result->fetch_assoc();
                            $hash = $row['password'];
                            $verified = $row['verified'];

                            $verifyPassword = password_verify($password_old, $hash);

                            if (!$verifyPassword) {
                                $message_type = "error";
                                $sent_message = $traCommon['password_old'][$lang] . " " . $traCommon['wrong'][$lang];
                            } else if ($verifyPassword && $verified == 1) {

                                $query = "UPDATE neil_user SET password = '$password' WHERE customer_id = $customer_id";
                                $result = $yhteys->query($query);

                                if ($result) {
                                    $query = "DELETE FROM neil_reset_password_tokens WHERE token = '$token'";
                                    $result_delete = $yhteys->query($query);

                                    $success = true;
                                } else {
                                    $message_type = "error";
                                    $sent_message = $traCommon['password_change_failed'][$lang];
                                }
                            } else if ($verified == 0) {
                                $message_type = "error";
                                $sent_message = $traCommon['email_confirm_click_email_link'][$lang];
                            } else {
                                $message_type = "error";
                                $sent_message = $traCommon['password_change_failed'][$lang];
                            }
                        } else {
                            $message_type = "error";
                            $sent_message = $traCommon['password_old'][$lang] . " " . $traCommon['wrong'][$lang];
                        }
                    }
                } else {
                    $message_type = "error";
                    $sent_message = $traCommon['password_change_failed'][$lang];
                }
            }
        }

        $token = $_GET['token'] ?? "";
        if ($token) {
            $token = $yhteys->real_escape_string(trim(strip_tags($token)));
            $query = "SELECT customer_id, token, valid_until FROM neil_reset_password_tokens WHERE token = '$token'";
            $result = $yhteys->query($query);
            if ($result->num_rows) {
                formPassword();
            } else if ($token && $success) {
                $message_type = "ok";
                $sent_message = $traCommon['password_changed'][$lang];
            } else {
                $message_type = "error";
                $sent_message = $traCommon['link_expired'][$lang];
            }
        } else if ($loggedIn > 0) {
            formPassword();
        } else {
            $message_type = "error";
            $sent_message = $traCommon['link_expired'][$lang];
        }
        ?>
        <div class="notification <?= isset($message_type) ? $message_type : '' ?>" aria-role="alert">
            <div>
                <?php
                if (isset($sent_message)) {
                    echo $sent_message;
                }
                ?>
            </div>
        </div>
    </section>
</main>

<?php include "sivuosat/footer.php"; ?>