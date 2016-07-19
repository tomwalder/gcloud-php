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

class KeyPathElement
{

    /**
     * Datastore entity Kind
     *
     * @var string
     */
    protected $kind;

    /**
     * Key ID (64 bit integer, modelled as string)
     *
     * @var string
     */
    protected $id;

    /**
     * Key Name (string, 500 chars max)
     *
     * @var string
     */
    protected $name;

    /**
     * Entity ancestor
     *
     * @var null|KeyPathElement
     */
    protected $ancestor = null;

    /**
     * KeyPathElement constructor.
     *
     * @param $kind
     * @param null $id
     * @param null $name
     */
    public function __construct($kind, $id = null, $name = null)
    {
        $this->kind = $kind;
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * Get the Entity Kind
     *
     * @return null
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * Get the key ID
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the key name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the Entity Kind
     *
     * @param $kind
     * @return $this
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
        return $this;
    }

    /**
     * Set the key ID
     *
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Set the key name
     *
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Set the Entity's ancestor
     *
     * @param KeyPathElement $kpe
     * @return $this
     */
    public function setAncestor(KeyPathElement $kpe)
    {
        $this->ancestor = $kpe;
        return $this;
    }

    /**
     * Get the ancestor of the key
     *
     * @return null|KeyPathElement
     */
    public function getAncestor()
    {
        return $this->ancestor;
    }

}
