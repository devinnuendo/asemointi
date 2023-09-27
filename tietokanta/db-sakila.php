<?php
define('PINS_ACCESS', TRUE);
$pins = "pins.php";
if (file_exists($pins)) {
    include_once($pins);
} else {
    $sakila_palvelin = getenv('SAKILA_PALVELIN');
    $sakila_kayttaja = getenv('SAKILA_KAYTTAJA');
    $sakila_salasana = getenv('SAKILA_SALASANA');
    $sakila_tietokanta = getenv('SAKILA_TIETOKANTA');

    $sakila_authorization = getenv('SAKILA_AUTHORIZATION');
}

$yhteys = new mysqli($sakila_palvelin, $sakila_kayttaja, $sakila_salasana, $sakila_tietokanta);

if ($yhteys->connect_error) {
    die($traCommon['connection_failed'][$lang] . ": " . $yhteys->connect_error);
}

$yhteys->set_charset("utf8");
