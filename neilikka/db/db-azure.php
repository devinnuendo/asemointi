<?php
define('PINS_ACCESS', TRUE);
$pins = "pins.php";
if (file_exists($pins)) {
    include_once($pins);
} else {
    $azure_palvelin = getenv('AZURE_PALVELIN');
    $azure_kayttaja = getenv('AZURE_KAYTTAJA');
    $azure_salasana = getenv('AZURE_SALASANA');
    $azure_tietokanta = getenv('AZURE_TIETOKANTA');

    $verkkosivu = getenv('VERKKOSIVU');
    $kansio = getenv('KANSIO');
    $email_admin = getenv('EMAIL_ADMIN');
}

$yhteys = new mysqli($azure_palvelin, $azure_kayttaja, $azure_salasana, $azure_tietokanta);

if ($yhteys->connect_error) {
    debugger("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
    die($traCommon['connection_failed'][$lang] . ": " . $yhteys->connect_error);
}

$yhteys->set_charset("utf8");
