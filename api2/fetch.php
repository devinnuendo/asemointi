<?php
define('directAccess', TRUE);
include 'scrt.php';
$key = KEY ? KEY : getenv("KEY");

$url = 'http://data.fixer.io/api/latest?access_key=' . $key . '&base=EUR';

$response = file_get_contents($url);
echo $response;
