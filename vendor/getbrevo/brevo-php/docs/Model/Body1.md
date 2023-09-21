# Body1

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Name of task | 
**duration** | **int** | Duration of task in milliseconds [1 minute &#x3D; 60000 ms] | [optional] 
**taskTypeId** | **string** | Id for type of task e.g Call / Email / Meeting etc. | 
**date** | [**\DateTime**] | Task date/time | 
**notes** | **string** | Notes added to a task | [optional] 
**done** | **bool** | Task marked as done | [optional] 
**assignToId** | **string** | User id to whom task is assigned | [optional] 
**contactsIds** | **int[]** | Contact ids for contacts linked to this task | [optional] 
**dealsIds** | **string[]** | Deal ids for deals a task is linked to | [optional] 
**companiesIds** | **string[]** | Companies ids for companies a task is linked to | [optional] 
**reminder** | [**\Brevo\Client\Model\TaskReminder**](TaskReminder.md) |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


