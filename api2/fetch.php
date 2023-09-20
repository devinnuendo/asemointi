<?php
define('directAccess', TRUE);
$scrt = "db/pins.php";
if (file_exists($scrt)) {
    include_once($scrt);
    $key = KEY;
} else {
    $key = getenv('KEY');
}

$url = 'http://data.fixer.io/api/latest?access_key=' . $key . '&base=EUR';

$response = file_get_contents($url);
echo $response;
