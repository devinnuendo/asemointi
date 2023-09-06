<?php
define('directAccess', TRUE);
include 'scrt.php';

$base = $_GET['base'];

$url = 'http://data.fixer.io/api/latest?access_key=' . KEY . $base;

$response = file_get_contents($url);
echo $response;
