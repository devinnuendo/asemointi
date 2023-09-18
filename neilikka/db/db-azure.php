<?php
define('PINS_ACCESS', TRUE);
$pins = "db/pins.php";
if (file_exists($pins)) {
    include_once($pins);
} else {
    die("Tunnukset puuttuvat, ota yhteys ylläpitoon: info@jenniina.fi");
}

$yhteys = new mysqli($azure_palvelin, $azure_kayttaja, $azure_salasana, $azure_tietokanta);

if ($yhteys->connect_error) {
    die("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
}

$yhteys->set_charset("utf8");
