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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" />
  <link rel="stylesheet" type="text/css" href="css/styles-nav.css" />
  <link rel="stylesheet" type="text/css" href="css/styles.css" />
  <script defer src="scripts/scripts.js"></script>
  <?php if (isset($css)) echo "<link rel='stylesheet' href='css/$css'>"; ?>
  <?php if (isset($script)) echo "<script src='scripts/$script'></script>"; ?>
  <title><?= $title ?? 'Sivusto'; ?></title>
</head>

<body>
  <header>
    <?php include "navbar.php"; ?>
    <h1><?= $title ?? 'Sivusto'; ?></h1>
  </header>