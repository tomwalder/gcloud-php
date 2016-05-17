<?php

require 'vendor/autoload.php';

// TODO get DrSlump auto-loading to work so that these globs can be removed
foreach (glob("vendor/datto/protobuf-php/library/DrSlump/Protobuf/*.php") as $filename) {
    require_once $filename;
}
foreach (glob("vendor/datto/protobuf-php/library/DrSlump/Protobuf/Compiler/*.php") as $filename) {
    require_once $filename;
}
foreach (glob("vendor/datto/protobuf-php/library/DrSlump/Protobuf/Compiler/protos/*.php") as $filename) {
    require_once $filename;
}

foreach (glob("generated/*.php") as $filename) {
    require_once $filename;
}

use \Google\GAX\CallSettings;
use \Google\Pubsub\V1\PublisherApi;
use \google\pubsub\V1\PubsubMessage;

// NOTE: Replace this with your own project ID if necessary.
const PROJECT_ID = "garrett-vkit";

function go() {

    $time = time();

    $publisherApi = new PublisherApi();

    Print "----------- createTopic\n";
    $topicName = PublisherApi::formatTopicName(PROJECT_ID, "php-test-topic-$time");
    $topic = $publisherApi->createTopic($topicName);
    Print "createTopic returned:\n";
    Print "topic name: ".$topic->getName()."\n";
    Print "project id: ".PublisherApi::parseProjectFromTopicName($topic->getName())."\n";
    Print "topic id: ".PublisherApi::parseTopicFromTopicName($topic->getName())."\n";

    Print "----------- listTopics\n";
    $projectName = PublisherApi::formatProjectName(PROJECT_ID);
    $i = 0;
    $firstTopic = null;
    $topics = $publisherApi->listTopics($projectName);
    foreach ($topics as $topicItem) {
        if ($i === 0) {
            $firstTopic = $topicItem;
        }
        Print "$i: ".$topicItem->getName()."\n";
        $i += 1;
    }
    Print "Total topics: $i\n";

    Print "----------- publish\n";
    Print "Publishing to ".$topic->getName()."\n";
    $message = new PubsubMessage();
    $message->setData("Hello world $time");
    $publisherApi->publish($topicName, [$message]);

    Print "----------- deleteTopic\n";
    if (!empty($firstTopic)) {
        Print "First topic: ".$firstTopic->getName()."\n";
    }

    Print "Deleting first topic.\n";
    $publisherApi->deleteTopic($firstTopic->getName());

    Print "----------- close\n";
    $publisherApi->close();
    Print "===== The end. =====\n";
}

try {
    go();
} catch (Exception $e) {
    Print $e->getMessage()."\n";
    Print $e->getTraceAsString()."\n";
}
