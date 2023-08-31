<!DOCTYPE html>
<html lang="fi">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="https://jenniina.fi/wp-content/uploads/2022/09/favicon.ico" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" />
  <link rel="stylesheet" type="text/css" href="css/styles-nav.css" />
  <link rel="stylesheet" type="text/css" href="css/styles.css" />
  <script src="scripts/scripts.js"></script>
  <?php if (isset($css)) echo "<link rel='stylesheet' href='$css'>"; ?>
  <title><?= $title ?? 'Sivusto'; ?></title>
</head>

<body>
  <header>
    <?php include "navbar.php"; ?>
    <h1><?= $title ?? 'Sivusto'; ?></h1>
  </header>