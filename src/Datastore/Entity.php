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

class Entity
{

    /**
     * @var Key
     */
    private $key;

    /**
     * Entity Properties - a string-indexed array of Values
     *
     * @var Value[]
     */
    private $properties = [];

    /**
     * If we are passed a Kind, then build a basic Key
     *
     * @todo consider PartitionId when building basic Key
     *
     * @param null $kind
     */
    public function __construct($kind = null)
    {
        if(null !== $kind) {
            $this->key = (new Key())
                ->setPath(new KeyPathElement($kind));
        }
    }

    /**
     * Get all properties
     *
     * @return Value[]
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * Get a property
     *
     * @param $property
     * @return Value|null
     */
    public function getProperty($property)
    {
        if(isset($this->properties[$property])) {
            return $this->properties[$property];
        }
        return null;
    }

    /**
     * Add a property to the Entity
     *
     * @param $property
     * @param Value $value
     */
    public function setProperty($property, Value $value)
    {
        $this->properties[$property] = $value;
    }

    /**
     * Set a specific property
     *
     * @todo Consider type-hinting OR autodetect value
     *
     * @param $property
     * @param $value
     */
    public function __set($property, $value)
    {
        $this->setProperty($property, $value);
    }

    /**
     * Get a property
     *
     * @param $property
     * @return Value|null
     */
    public function __get($property)
    {
        return $this->getProperty($property);
    }

}