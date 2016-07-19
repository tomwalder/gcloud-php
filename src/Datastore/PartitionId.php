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

class PartitionId
{

    /**
     * @var string
     */
    private $project_id;

    /**
     * @var string
     */
    private $namespace;

    /**
     * Set project and namespace on construction
     *
     * @param $project_id
     * @param $namespace
     */
    public function __construct($project_id = null, $namespace = null)
    {
        $this->project_id = $project_id;
        $this->namespace = $namespace;
    }

    /**
     * @return string
     */
    public function getProjectId()
    {
        return $this->project_id;
    }

    /**
     * @param string $project_id
     * @return PartitionId
     */
    public function setProjectId($project_id)
    {
        $this->project_id = $project_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * @param string $namespace
     * @return PartitionId
     */
    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
        return $this;
    }


}
