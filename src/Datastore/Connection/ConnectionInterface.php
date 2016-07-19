<?php
/**
 * Copyright 2016 Google Inc. All Rights Reserved.
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

/**
 * Represents a connection to
 * [Datstore](https://cloud.google.com/datastore/).
 */
interface ConnectionInterface
{

    /**
     * Start a new transaction in Datastore and return it's reference
     *
     * @param array $args
     * @return string
     */
    public function beginTransaction($project, array $args = []);

    /**
     * Run a GQL Query and return the response
     *
     * @param PartitionId $partition
     * @param ReadOptions $options
     * @param GqlQuery $query
     * @param array $args
     * @return mixed
     */
    public function runGqlQuery(PartitionId $partition, ReadOptions $options, GqlQuery $query, array $args = []);

    /**
     * Run a standard Query and return the response
     *
     * @param PartitionId $partition
     * @param ReadOptions $options
     * @param Query $query
     * @param array $args
     * @return mixed
     */
    public function runQuery(PartitionId $partition, ReadOptions $options, Query $query, array $args = []);

    public function allocateIds(array $args = []);

    public function lookup(array $args = []);

    public function commit(array $args = []);

    public function rollback(array $args = []);

}