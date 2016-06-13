<?php
/**
 * Copyright 2015 Google Inc. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\Cloud\Datastore;

use Google\Cloud\ClientTrait;
use Google\Cloud\Datastore\Connection\ConnectionInterface;
use Google\Cloud\Datastore\Connection\Rest;

/**
 * Google Cloud Datastore client.
 */
class DatastoreClient
{
    use ClientTrait;

    const DATASTORE_SCOPE = 'https://www.googleapis.com/auth/datastore';

    /**
     * @var ConnectionInterface $connection Represents a connection to Storage.
     */
    protected $connection;

    /**
     * Create a Datastore client.
     *
     * Example:
     * ```
     * use Google\Cloud\Datastore\DatastoreClient;
     *
     * $storage = new DatastoreClient([
     *     'projectId' => 'myAwesomeProject'
     * ]);
     * ```
     *
     * @param array $config {
     *     Configuration options.
     *
     *     @type string $projectId The project ID from the Google Developer's
     *           Console.
     *     @type callable $authHttpHandler A handler used to deliver Psr7
     *           requests specifically for authentication.
     *     @type callable $httpHandler A handler used to deliver Psr7 requests.
     *     @type string $keyFile The contents of the service account
     *           credentials .json file retrieved from the Google Developers
     *           Console.
     *     @type string $keyFilePath The full path to your service account
     *           credentials .json file retrieved from the Google Developers
     *           Console.
     *     @type int $retries Number of retries for a failed request. Defaults
     *           to 3.
     *     @type array $scopes Scopes to be used for the request.
     * }
     */
    public function __construct(array $config = [])
    {
        if (!isset($config['scopes'])) {
            $config['scopes'] = [self::DATASTORE_SCOPE];
        }

        $this->connection = new Rest($this->configureAuthentication($config));
    }

    /**
     * @todo find the right way to ensure the connection always works with one specific project ID
     *
     * @return string
     */
    public function beginTransaction()
    {
        return $this->connection->beginTransaction(['projectId' => $this->projectId]);
    }

}