<?php
define('PINS_ACCESS', TRUE);
$pins = "../db/pins.php";
if (file_exists($pins)) {
    include_once($pins);
} else {
    $brevo_api_key = getenv('BREVO_API_KEY');
}
require_once(__DIR__ . '/../../vendor/autoload.php');

// Configure API key authorization: api-key
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', $brevo_api_key);
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api-key', 'Bearer');
// Configure API key authorization: partner-key
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('partner-key', $brevo_api_key);
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('partner-key', 'Bearer');

$apiInstance = new Brevo\Client\Api\TransactionalEmailsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
// $sendSmtpEmail = new \Brevo\Client\Model\SendSmtpEmail([
//     'subject' => 'from the PHP SDK!',
//     'sender' => ['name' => 'Sendinblue', 'email' => 'jenniina@jenniina.fi'],
//     'replyTo' => ['name' => 'Sendinblue', 'email' => 'jenniina@jenniina.fi'],
//     'to' => [['name' => 'Jenniina Laine', 'email' => 'jenniina.laine@gmail.com']],
//     'htmlContent' => '<html><body><h1>This is a transactional email {{params.bodyMessage}}</h1></body></html>',
//     'params' => ['bodyMessage' => 'made just for you!']
// ]); // \Brevo\Client\Model\SendSmtpEmail | Values to send a transactional email

// try {
//     $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
//     print_r($result);
// } catch (Exception $e) {
//     echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
// }
