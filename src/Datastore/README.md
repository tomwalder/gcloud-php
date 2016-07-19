# Datastore Examples #

## Begin Transaction ##

```php
$datastore_client = new \Google\Cloud\Datastore\DatastoreClient([
   'keyFilePath' => '...' // The service JSON file includes the projectID
]);

$txn = $datastore_client->beginTransaction();
```

## Run GQL Query ##

```php
$datastore_client = new \Google\Cloud\Datastore\DatastoreClient([
   'keyFilePath' => '...' // The service JSON file includes the projectID
]);

$result = $datastore_client->runGqlQuery('SELECT * FROM Book');
```
