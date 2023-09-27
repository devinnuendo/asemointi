<?php
include "../config/posti.php";

$sent_message = "";
$message_type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($yhteys->connect_error) {
        debugger("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
        $message_type = "error";
        $sent_message = $traCommon['connection_failed'][$lang] . ": " . $yhteys->connect_error;
    }
    $yhteys->set_charset("utf8");

    $email = $yhteys->real_escape_string(strip_tags(trim($_POST['email'])));
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Validate e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message_type = "error";
        $sent_message = "$traCommon[email_fail][$lang].";
    } else {

        $lisattiin_token = false;
        $query = "SELECT customer_id, first_name, last_name FROM neil_user WHERE email = '$email'";
        $result = $yhteys->query($query);
        if (!$result) {
            $message_type = "error";
            $sent_message = $traCommon['connection_failed'][$lang] . ": "  . $yhteys->connect_error;
        }
        if (!$result->num_rows) {
            $message_type = "ok";
            $sent_message = $traCommon['email_sent_if_exists'][$lang] . ", " . $traCommon['email_to'][$lang] . " " . $email . ". " . $traCommon['password_change_email'][$lang];
        } else {
            $rows = $result->fetch_assoc();
            $id = $rows['customer_id'];
            $first_name = $rows['first_name'];
            $last_name = $rows['last_name'];
            $token = bin2hex(random_bytes(50));
            //$valid_until = date('Y-m-d', strtotime("+1 day"));
            $valid_until = date('Y-m-d H:i:s', strtotime("+1 day"));

            $email_sender_name = "Puutarhaliike Neilikka";
            $email_sender_email = "$email_admin";
            $email_recipient_name = "$first_name $last_name";
            $email_recipient_email = $email;
            $email_title = $traCommon['password_new'][$lang];
            $email_body  = "<html><body><h1>{$traCommon['password_forgot_question'][$lang]}</h1>";
            $email_body .= "<p>{$traCommon['hello'][$lang]} $email_recipient_name, <br /><br />";
            $email_body .= "{$traCommon['password_change_link'][$lang]}<br><br> ";
            $email_body .= "<a href='$verkkosivu/$kansio/salasana-vaihda.php?token=$token'>{$traCommon['password_new'][$lang]}</a><br /><br />";
            $email_body .= "{$traCommon['regards'][$lang]},<br />{$traLocal['staff_neilikka'][$lang]}</p></body></html>";

            try {
                $lahetetty = posti($email_recipient_name, $email_recipient_email, $email_sender_name, $email_sender_email, $email_title, $email_body);

                if ($lahetetty) {
                    try {
                        $query = "INSERT INTO neil_reset_password_tokens (customer_id, token, valid_until) VALUES ($id,'$token','$valid_until') 
                        ON DUPLICATE KEY UPDATE token = '$token', valid_until = '$valid_until'";
                        $result = $yhteys->query($query);
                        $lisattiin_token = $yhteys->affected_rows;

                        if ($lisattiin_token) {
                            $message_type = "ok";
                            $sent_message = "{$traCommon['email_sent_if_exists'][$lang]}, {$traCommon['email_to'][$lang]} $email. {$traCommon['password_change_email'][$lang]}";
                        }
                    } catch (Exception $e) {
                        $message_type = "error";
                        $sent_message = $traCommon['email_sent_fail'][$lang];
                        debugger("Sähköpostin lähetys epäonnistui: " . $e->getMessage(), PHP_EOL);
                    }
                } else {
                    $message_type = "error";
                    $sent_message = $traCommon['email_sent_fail'][$lang];
                }
            } catch (Exception $e) {
                $message_type = "error";
                $sent_message = $traCommon['email_sent_fail'][$lang];
                debugger("Sähköpostin lähetys epäonnistui: " . $e->getMessage(), PHP_EOL);
            }
        }
    }
}
