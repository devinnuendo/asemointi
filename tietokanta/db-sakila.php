<?php
define('PINS_ACCESS', TRUE);
$pins = "./pins.php";
if (file_exists($pins)) {
    include_once($pins);
} else {
    die("Tunnukset puuttuvat, ota yhteys ylläpitoon: info@jenniina.fi");
}

$yhteys = new mysqli($sakila_palvelin, $sakila_kayttaja, $sakila_salasana, $sakila_tietokanta);

if ($yhteys->connect_error) {
    die("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
}

$yhteys->set_charset("utf8");
