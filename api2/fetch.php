<?php
define('directAccess', TRUE);
include 'scrt.php';

$url = 'http://data.fixer.io/api/latest?access_key=' . KEY . '&base=EUR';

$response = file_get_contents($url);
echo $response;
