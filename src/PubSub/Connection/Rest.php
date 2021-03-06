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

namespace Google\Cloud\PubSub\Connection;

use Google\Cloud\RequestBuilder;
use Google\Cloud\RequestWrapper;
use Google\Cloud\RestTrait;
use Google\Cloud\UriTrait;

/**
 * Implementation of the
 * [Google Pub/Sub REST API](https://cloud.google.com/pubsub/reference/rest/).
 */
class Rest implements ConnectionInterface
{
    use RestTrait;
    use UriTrait;

    const BASE_URI = 'https://pubsub.googleapis.com/';

    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->setRequestWrapper(new RequestWrapper($config));
        $this->setRequestBuilder(new RequestBuilder(
            __DIR__ . '/ServiceDefinition/pubsub-v1.json',
            self::BASE_URI,
            ['resources', 'projects']
        ));
    }

    /**
     * @param array $args
     */
    public function createTopic(array $args)
    {
        return $this->send('topics', 'create', $args);
    }

    /**
     * @param array $args
     */
    public function getTopic(array $args)
    {
        return $this->send('topics', 'get', $args);
    }

    /**
     * @param array $args
     */
    public function deleteTopic(array $args)
    {
        return $this->send('topics', 'delete', $args);
    }

    /**
     * @param array $args
     */
    public function listTopics(array $args)
    {
        return $this->send('topics', 'list', $args);
    }

    /**
     * @param array $args
     */
    public function publishMessage(array $args)
    {
        return $this->send('topics', 'publish', $args);
    }

    /**
     * @param array $args
     */
    public function listSubscriptionsByTopic(array $args)
    {
        return $this->send('topics.resources.subscriptions', 'list', $args);
    }

    /**
     * @param array $args
     */
    public function createSubscription(array $args)
    {
        return $this->send('subscriptions', 'create', $args);
    }

    /**
     * @param array $args
     */
    public function getSubscription(array $args)
    {
        return $this->send('subscriptions', 'get', $args);
    }

    /**
     * @param array $args
     */
    public function listSubscriptions(array $args)
    {
        return $this->send('subscriptions', 'list', $args);
    }

    /**
     * @param array $args
     */
    public function deleteSubscription(array $args)
    {
        return $this->send('subscriptions', 'delete', $args);
    }

    /**
     * @param array $args
     */
    public function modifyPushConfig(array $args)
    {
        return $this->send('subscriptions', 'modifyPushConfig', $args);
    }

    /**
     * @param array $args
     */
    public function pull(array $args)
    {
        return $this->send('subscriptions', 'pull', $args);
    }

    /**
     * @param array $args
     */
    public function modifyAckDeadline(array $args)
    {
        return $this->send('subscriptions', 'modifyAckDeadline', $args);
    }

    /**
     * @param array $args
     */
    public function acknowledge(array $args)
    {
        return $this->send('subscriptions', 'acknowledge', $args);
    }
}
