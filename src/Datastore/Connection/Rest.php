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

namespace Google\Cloud\Datastore\Connection;

use Google\Cloud\Datastore\GqlQuery;
use Google\Cloud\Datastore\PartitionId;
use Google\Cloud\Datastore\Query;
use Google\Cloud\Datastore\ReadOptions;
use Google\Cloud\RequestBuilder;
use Google\Cloud\RequestWrapper;
use Google\Cloud\RestTrait;
use Google\Cloud\UriTrait;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;

/**
 * Implementation of the
 * [Google Cloud Datastore REST API](https://cloud.google.com/datastore/reference/rest/)
 */
class Rest implements ConnectionInterface
{
    use RestTrait;
    use UriTrait;

    const BASE_URI = 'https://datastore.googleapis.com/';

    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->setRequestWrapper(new RequestWrapper($config));
        $this->setRequestBuilder(new RequestBuilder(
            __DIR__ . '/ServiceDefinition/datastore-v1beta3.json',
            self::BASE_URI
        ));
    }

    /**
     * Start a new transaction in Datastore and return it's reference
     *
     * @param array $args
     * @return string
     * @throws \Google\Cloud\Exception\GoogleException
     */
    public function beginTransaction($project, array $args = [])
    {
        $response = $this->send('projects', 'beginTransaction', $args + ['projectId' => $project]);
        if(is_array($response) && isset($response['transaction'])) {
            return $response['transaction'];
        }
        throw new \Google\Cloud\Exception\GoogleException("Failed to begin a Datastore transaction");
    }


    /**
     * Run a GQL Query and return the response
     *
     * @param PartitionId $partition
     * @param ReadOptions $options
     * @param GqlQuery $query
     * @param array $args
     * @return mixed
     */
    public function runGqlQuery(PartitionId $partition, ReadOptions $options, GqlQuery $query, array $args = [])
    {
        $gql_query_body_part = [
            'partitionId' => [
                'projectId' => $partition->getProjectId(),
                // 'namespaceId' =>
            ],
            'readOptions' => [
                'readConsistency' => $options->getReadConsistency(),
                // "transaction": string,
            ],
            'gqlQuery' => [
                'allowLiterals' => $query->allowLiterals(),
                'queryString' => $query->getQuery()
            ]
        ];
        $response = $this->send('projects', 'runQuery', $args + $gql_query_body_part + ['projectId' => $partition->getProjectId()]);
        return $response;
    }

    /**
     * Run a standard Query and return the response
     *
     * @param PartitionId $partition
     * @param ReadOptions $options
     * @param Query $query
     * @param array $args
     * @return mixed
     */
    public function runQuery(PartitionId $partition, ReadOptions $options, Query $query, array $args = [])
    {
        // @todo
    }

    public function allocateIds(array $args = [])
    {

    }

    public function lookup(array $args = [])
    {

    }

    public function commit(array $args = [])
    {

    }

    public function rollback(array $args = [])
    {

    }

}