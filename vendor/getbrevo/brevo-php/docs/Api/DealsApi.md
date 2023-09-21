# Brevo\Client\DealsApi

All URIs are relative to *https://api.brevo.com/v3*

Method | HTTP request | Description
------------- | ------------- | -------------
[**crmAttributesDealsGet**](DealsApi.md#crmAttributesDealsGet) | **GET** /crm/attributes/deals | Get deal attributes
[**crmDealsGet**](DealsApi.md#crmDealsGet) | **GET** /crm/deals | Get all deals
[**crmDealsIdDelete**](DealsApi.md#crmDealsIdDelete) | **DELETE** /crm/deals/{id} | Delete a deal
[**crmDealsIdGet**](DealsApi.md#crmDealsIdGet) | **GET** /crm/deals/{id} | Get a deal
[**crmDealsIdPatch**](DealsApi.md#crmDealsIdPatch) | **PATCH** /crm/deals/{id} | Update a deal
[**crmDealsLinkUnlinkIdPatch**](DealsApi.md#crmDealsLinkUnlinkIdPatch) | **PATCH** /crm/deals/link-unlink/{id} | Link and Unlink a deal with contacts and companies
[**crmDealsPost**](DealsApi.md#crmDealsPost) | **POST** /crm/deals | Create a deal
[**crmPipelineDetailsAllGet**](DealsApi.md#crmPipelineDetailsAllGet) | **GET** /crm/pipeline/details/all | Get all pipelines
[**crmPipelineDetailsGet**](DealsApi.md#crmPipelineDetailsGet) | **GET** /crm/pipeline/details | Get pipeline stages
[**crmPipelineDetailsPipelineIDGet**](DealsApi.md#crmPipelineDetailsPipelineIDGet) | **GET** /crm/pipeline/details/{pipelineID} | Get a pipeline


# **crmAttributesDealsGet**
> \Brevo\Client\Model\DealAttributes crmAttributesDealsGet()

Get deal attributes

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api-key
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api-key', 'Bearer');
// Configure API key authorization: partner-key
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('partner-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('partner-key', 'Bearer');

$apiInstance = new Brevo\Client\Api\DealsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->crmAttributesDealsGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DealsApi->crmAttributesDealsGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Brevo\Client\Model\DealAttributes**](../Model/DealAttributes.md)

### Authorization

[api-key](../../README.md#api-key), [partner-key](../../README.md#partner-key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **crmDealsGet**
> \Brevo\Client\Model\DealsList crmDealsGet($filtersAttributesDealName, $filtersLinkedCompaniesIds, $filtersLinkedContactsIds, $offset, $limit, $sort, $sortBy)

Get all deals

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api-key
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api-key', 'Bearer');
// Configure API key authorization: partner-key
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('partner-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('partner-key', 'Bearer');

$apiInstance = new Brevo\Client\Api\DealsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$filtersAttributesDealName = "filtersAttributesDealName_example"; // string | Filter by attributes. If you have filter for owner on your side please send it as `filters[attributes.deal_owner]`.\"
$filtersLinkedCompaniesIds = "filtersLinkedCompaniesIds_example"; // string | Filter by linked companies ids
$filtersLinkedContactsIds = "filtersLinkedContactsIds_example"; // string | Filter by linked companies ids
$offset = 789; // int | Index of the first document of the page
$limit = 50; // int | Number of documents per page
$sort = "sort_example"; // string | Sort the results in the ascending/descending order. Default order is **descending** by creation if `sort` is not passed
$sortBy = "sortBy_example"; // string | The field used to sort field names.

try {
    $result = $apiInstance->crmDealsGet($filtersAttributesDealName, $filtersLinkedCompaniesIds, $filtersLinkedContactsIds, $offset, $limit, $sort, $sortBy);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DealsApi->crmDealsGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filtersAttributesDealName** | **string**| Filter by attributes. If you have filter for owner on your side please send it as &#x60;filters[attributes.deal_owner]&#x60;.\&quot; | [optional]
 **filtersLinkedCompaniesIds** | **string**| Filter by linked companies ids | [optional]
 **filtersLinkedContactsIds** | **string**| Filter by linked companies ids | [optional]
 **offset** | **int**| Index of the first document of the page | [optional]
 **limit** | **int**| Number of documents per page | [optional] [default to 50]
 **sort** | **string**| Sort the results in the ascending/descending order. Default order is **descending** by creation if &#x60;sort&#x60; is not passed | [optional]
 **sortBy** | **string**| The field used to sort field names. | [optional]

### Return type

[**\Brevo\Client\Model\DealsList**](../Model/DealsList.md)

### Authorization

[api-key](../../README.md#api-key), [partner-key](../../README.md#partner-key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **crmDealsIdDelete**
> crmDealsIdDelete($id)

Delete a deal

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api-key
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api-key', 'Bearer');
// Configure API key authorization: partner-key
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('partner-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('partner-key', 'Bearer');

$apiInstance = new Brevo\Client\Api\DealsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | 

try {
    $apiInstance->crmDealsIdDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling DealsApi->crmDealsIdDelete: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**|  |

### Return type

void (empty response body)

### Authorization

[api-key](../../README.md#api-key), [partner-key](../../README.md#partner-key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **crmDealsIdGet**
> \Brevo\Client\Model\Deal crmDealsIdGet($id)

Get a deal

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api-key
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api-key', 'Bearer');
// Configure API key authorization: partner-key
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('partner-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('partner-key', 'Bearer');

$apiInstance = new Brevo\Client\Api\DealsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | 

try {
    $result = $apiInstance->crmDealsIdGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DealsApi->crmDealsIdGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**|  |

### Return type

[**\Brevo\Client\Model\Deal**](../Model/Deal.md)

### Authorization

[api-key](../../README.md#api-key), [partner-key](../../README.md#partner-key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **crmDealsIdPatch**
> crmDealsIdPatch($id, $body)

Update a deal

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api-key
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api-key', 'Bearer');
// Configure API key authorization: partner-key
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('partner-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('partner-key', 'Bearer');

$apiInstance = new Brevo\Client\Api\DealsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | 
$body = new \Brevo\Client\Model\Body4(); // \Brevo\Client\Model\Body4 | Updated deal details.

try {
    $apiInstance->crmDealsIdPatch($id, $body);
} catch (Exception $e) {
    echo 'Exception when calling DealsApi->crmDealsIdPatch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**|  |
 **body** | [**\Brevo\Client\Model\Body4**](../Model/Body4.md)| Updated deal details. |

### Return type

void (empty response body)

### Authorization

[api-key](../../README.md#api-key), [partner-key](../../README.md#partner-key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **crmDealsLinkUnlinkIdPatch**
> crmDealsLinkUnlinkIdPatch($id, $body)

Link and Unlink a deal with contacts and companies

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api-key
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api-key', 'Bearer');
// Configure API key authorization: partner-key
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('partner-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('partner-key', 'Bearer');

$apiInstance = new Brevo\Client\Api\DealsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | 
$body = new \Brevo\Client\Model\Body5(); // \Brevo\Client\Model\Body5 | Linked / Unlinked contacts and companies ids.

try {
    $apiInstance->crmDealsLinkUnlinkIdPatch($id, $body);
} catch (Exception $e) {
    echo 'Exception when calling DealsApi->crmDealsLinkUnlinkIdPatch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**|  |
 **body** | [**\Brevo\Client\Model\Body5**](../Model/Body5.md)| Linked / Unlinked contacts and companies ids. |

### Return type

void (empty response body)

### Authorization

[api-key](../../README.md#api-key), [partner-key](../../README.md#partner-key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **crmDealsPost**
> \Brevo\Client\Model\InlineResponse201 crmDealsPost($body)

Create a deal

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api-key
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api-key', 'Bearer');
// Configure API key authorization: partner-key
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('partner-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('partner-key', 'Bearer');

$apiInstance = new Brevo\Client\Api\DealsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Brevo\Client\Model\Body3(); // \Brevo\Client\Model\Body3 | Deal create data.

try {
    $result = $apiInstance->crmDealsPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DealsApi->crmDealsPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Brevo\Client\Model\Body3**](../Model/Body3.md)| Deal create data. |

### Return type

[**\Brevo\Client\Model\InlineResponse201**](../Model/InlineResponse201.md)

### Authorization

[api-key](../../README.md#api-key), [partner-key](../../README.md#partner-key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **crmPipelineDetailsAllGet**
> \Brevo\Client\Model\Pipelines crmPipelineDetailsAllGet()

Get all pipelines

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api-key
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api-key', 'Bearer');
// Configure API key authorization: partner-key
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('partner-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('partner-key', 'Bearer');

$apiInstance = new Brevo\Client\Api\DealsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->crmPipelineDetailsAllGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DealsApi->crmPipelineDetailsAllGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Brevo\Client\Model\Pipelines**](../Model/Pipelines.md)

### Authorization

[api-key](../../README.md#api-key), [partner-key](../../README.md#partner-key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **crmPipelineDetailsGet**
> \Brevo\Client\Model\Pipeline crmPipelineDetailsGet()

Get pipeline stages

This endpoint is deprecated. Prefer /crm/pipeline/details/{pipelineID} instead.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api-key
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api-key', 'Bearer');
// Configure API key authorization: partner-key
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('partner-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('partner-key', 'Bearer');

$apiInstance = new Brevo\Client\Api\DealsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->crmPipelineDetailsGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DealsApi->crmPipelineDetailsGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Brevo\Client\Model\Pipeline**](../Model/Pipeline.md)

### Authorization

[api-key](../../README.md#api-key), [partner-key](../../README.md#partner-key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **crmPipelineDetailsPipelineIDGet**
> \Brevo\Client\Model\Pipelines crmPipelineDetailsPipelineIDGet($pipelineID)

Get a pipeline

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api-key
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api-key', 'Bearer');
// Configure API key authorization: partner-key
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('partner-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('partner-key', 'Bearer');

$apiInstance = new Brevo\Client\Api\DealsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$pipelineID = "pipelineID_example"; // string | 

try {
    $result = $apiInstance->crmPipelineDetailsPipelineIDGet($pipelineID);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DealsApi->crmPipelineDetailsPipelineIDGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **pipelineID** | **string**|  |

### Return type

[**\Brevo\Client\Model\Pipelines**](../Model/Pipelines.md)

### Authorization

[api-key](../../README.md#api-key), [partner-key](../../README.md#partner-key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

