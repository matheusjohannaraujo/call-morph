<?php

require_once "vendor/autoload.php";

// The `serialize_function` and `unserialize_function` functions can be used in PHP versions 7.x and 8.x

function serialize_function(\Closure $callback) {
    $ver = (float) phpversion();
    if ($ver >= 7.4) {
        \Laravel\SerializableClosure\SerializableClosure::setSecretKey('secret');
        return serialize(new \Laravel\SerializableClosure\SerializableClosure($callback));
    }
    return \Opis\Closure\serialize($callback);
}

function unserialize_function(string $callback) {
    $ver = (float) phpversion();
    if ($ver >= 7.4) {
        \Laravel\SerializableClosure\SerializableClosure::setSecretKey('secret');
        return unserialize($callback)->getClosure();
    }
    return \Opis\Closure\unserialize($callback);
}

$name = "Johann";
$closure = function() use ($name) {
    sleep(1);
    return "My name is ${name} - Rand: " . rand(0, 99999999);
};

$serialized = serialize_function($closure);
echo "<hr>";
var_dump($serialized);
echo "<hr>";
$closure = unserialize_function($serialized);
echo $closure();
