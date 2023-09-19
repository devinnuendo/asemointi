<?php error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<!DOCTYPE html>
<html lang="fi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="One of the tasks made for the course Web-ohjelmointikoulutus in Omnia">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

<body>
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