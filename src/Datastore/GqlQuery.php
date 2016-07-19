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

class GqlQuery
{

    /**
     * @var string
     */
    private $query;

    /**
     * @var bool
     */
    private $allow_literals = true;

    /**
     * @var array
     */
    private $named_params = [];

    /**
     * @var array
     */
    private $num_params = [];

    public function __construct($gql)
    {
        $this->query = $gql;
    }

    /**
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param string $query
     * @return GqlQuery
     */
    public function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @return array
     */
    public function getNamedParams()
    {
        return $this->named_params;
    }

    /**
     * @param array $named_params
     * @return GqlQuery
     */
    public function setNamedParams(array $named_params)
    {
        $this->named_params = $named_params;
        return $this;
    }

    /**
     * @return array
     */
    public function getNumParams()
    {
        return $this->num_params;
    }

    /**
     * @param array $num_params
     * @return GqlQuery
     */
    public function setNumParams(array $num_params)
    {
        $this->num_params = $num_params;
        return $this;
    }

    /**
     * @param bool $allow
     * @return $this
     */
    public function setAllowLiterals($allow = true)
    {
        $this->allow_literals = $allow;
        return $this;
    }

    /**
     * @return bool
     */
    public function allowLiterals()
    {
        return $this->allow_literals;
    }

}
