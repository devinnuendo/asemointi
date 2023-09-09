<!DOCTYPE html>
<html lang="fi">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="One of the tasks made for the course Web-ohjelmointikoulutus in Omnia">
  <link rel="icon" type="image/x-icon" href="favicon.ico" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" />
  <link rel="stylesheet" type="text/css" href="css/styles-nav.css" />
  <link rel="stylesheet" type="text/css" href="css/styles.css" />
  <script defer src="scripts/scripts.js"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <?php if (isset($css)) echo "<link rel='stylesheet' href='$css'>"; ?>
  <title><?= $title ?? 'Sivusto'; ?></title>
</head>

<body>
  <header>
    <?php include "navbar.php"; ?>
    <h1><?= $title ?? 'Sivusto'; ?></h1>
  </header>