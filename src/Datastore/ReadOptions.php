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

class ReadOptions
{

    const CONSISTENCY_UNSPECIFIED = 'READ_CONSISTENCY_UNSPECIFIED';
    const CONSISTENCY_STRONG = 'STRONG';
    const CONSISTENCY_EVENTUAL = 'EVENTUAL';

    /**
     * @var string
     */
    private $read_consistency = self::CONSISTENCY_EVENTUAL;

    /**
     * @var string
     */
    private $transaction;

    /**
     * @return string
     */
    public function getReadConsistency()
    {
        return $this->read_consistency;
    }

    /**
     * @param string $read_consistency
     * @return ReadOptions
     */
    public function setReadConsistency($read_consistency)
    {
        $this->read_consistency = $read_consistency;
        return $this;
    }

    /**
     * @return string
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * @param string $transaction
     * @return ReadOptions
     */
    public function setTransaction($transaction)
    {
        $this->transaction = $transaction;
        return $this;
    }

}
