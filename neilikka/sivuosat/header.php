<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include "../config/debugger.php";
include "../config/language.php";

session_start();

$userLanguage = $_SESSION["user_language"] ?? "fi";

if (isset($_POST["toggle_language"])) {
    $switchToLanguage = $_POST["toggle_language"];
    $_SESSION["user_language"] = $switchToLanguage; // Switch language
    $userLanguage = $switchToLanguage;
}

if ($userLanguage === "en") {
    $translationFile = file_get_contents("../config/translations/translations_en.json");
} elseif ($userLanguage === "fi") {
    $translationFile = file_get_contents("../config/translations/translations_fi.json");
} elseif ($userLanguage === "sv") {
    $translationFile = file_get_contents("../config/translations/translations_sv.json");
} else {
    $translationFile = file_get_contents("../config/translations/translations_fi.json");
}

// Parse the JSON translation file into a PHP associative array
$tra = json_decode($translationFile, true);



?>
<!DOCTYPE html>
<html lang="<?= $userLanguage ?>">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="One of the tasks made for the course Web-ohjelmointikoulutus in Omnia">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <?php if (isset($bootstrap)) echo $bootstrap; ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" />
    <link rel="stylesheet" type="text/css" href="css/styles-nav.css" />
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ephesis&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <script defer src="scripts/scripts.js"></script>
    <?php if (isset($script)) echo "<script src='scripts/$script'></script>"; ?>
    <?php if (isset($css)) echo "<link rel='stylesheet' href='css/$css'>"; ?>
    <title><?= $title ?? 'Puutarhaliike Neilikka'; ?></title>
</head>

<body class="<?= $userLanguage ?>">
    <header>
        <?php include "navbar.php"; ?>
        <picture>
            <source media="(max-width: 640px)" srcset=<?php
                                                        if (isset($img640)) echo 'img/' . $img640;
                                                        else echo "img/carnation-1325012_640.jpg"; ?> />
            <source media="(min-width: 641px)" srcset=<?php if (isset($img1280)) echo 'img/' . $img1280;
                                                        else echo "img/carnation-1325012_1280.jpg"; ?> />
            <source media="(min-width: 1920px)" srcset=<?php if (isset($img1920)) echo 'img/' . $img1920;
                                                        else echo "img/carnation-1325012_1920.jpg" ?> />
            <img src=<?php if (isset($img1920)) echo 'img/' . $img1920;
                        else echo "carnation-1325012_1920.jpg" ?> alt="Kukkia" />
        </picture>
        <h1 class="site-heading"><span><?= $title ?? 'Puutarhaliike Neilikka'; ?></span></h1>
    </header>