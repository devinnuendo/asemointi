<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include "../config/debugger.php";
include "../config/language.php";

session_start();

$lang = $_SESSION["user_language"] ?? "fi";

if (isset($_POST["toggle_language"])) {
    $switchToLanguage = $_POST["toggle_language"];
    $_SESSION["user_language"] = $switchToLanguage; // Switch language
    $lang = $switchToLanguage;
}


include "../config/translations/translations.php";
include "translations/translations.php";

// if ($lang === "en") {
//     $translationFile = file_get_contents("../config/translations/translations_en.json");
// } elseif ($lang === "fi") {
//     $translationFile = file_get_contents("../config/translations/translations_fi.json");
// } elseif ($lang === "sv") {
//     $translationFile = file_get_contents("../config/translations/translations_sv.json");
// } else {
//     $translationFile = file_get_contents("../config/translations/translations_fi.json");
// }

// // Parse the JSON translation file into a PHP associative array
// $tra = json_decode($translationFile, true);

include_once "db/db-azure.php";

$loggedIn = loggedIn();

$bonus = bonus();
$employee = employee();
$supervisor = supervisor();
$admin = admin();

//echo "customer_id: " . $_SESSION['customer_id'] . ", loggedIn: " . $_SESSION['loggedIn'] . ", bonus: " . $bonus . ", employee: " . $employee . ", supervisor: " . $supervisor . ", admin: " . $admin . "<br>";
?>

<!DOCTYPE html>
<html lang="<?= $lang ?>">