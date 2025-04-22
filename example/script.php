<?php

use MJohann\Packlib\Facades\CallMorph;

require_once "../vendor/autoload.php";

$name = "Johann";
$closure = function () use ($name) {
    sleep(1);
    return "My name is " . $name . " - Rand: " . rand(0, 999);
};

// Using a Facade to instantiate and configure an instance of the SimpleRabbitMQ class.
CallMorph::init("secret");

$serialized = CallMorph::serialize($closure);
echo "CallMorph::serialize", PHP_EOL;
var_dump($serialized);
echo PHP_EOL, PHP_EOL;

echo "CallMorph::unserialize", PHP_EOL;
$closure = CallMorph::unserialize($serialized);
echo $closure();
