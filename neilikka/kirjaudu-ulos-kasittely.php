<?php
include "sivuosat/top.php";

if (isset($_POST["logout"])) {
    // session_unset();
    // session_destroy();
    $_SESSION['loggedIn'] = null;
    if (isset($_SESSION['customer_id']))
        delete_rememberme_token($_SESSION['customer_id']);
    $_SESSION['customer_id'] = null;
    unset($_COOKIE['rememberme']);
    header("Location: index.php");
    exit;
}
