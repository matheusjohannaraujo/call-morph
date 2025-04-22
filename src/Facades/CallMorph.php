<?php

/*
	GitHub: https://github.com/matheusjohannaraujo/call-morph
	Country: Brasil
	State: Pernambuco
	Developer: Matheus Johann Araujo
	Date: 2025-04-22
*/

namespace MJohann\Packlib\Facades;

use MJohann\Packlib\CallMorph as CallMorphClass;

/**
 * Facade for the CallMorph providing static access to RabbitMQ operations.
 *
 * @method static void init(string $secret = "secret") Initializes a new CallMorph.
 * @method static CallMorph getInstance() Retrieves the current CallMorph instance.
 * @method static mixed __callStatic(string $method, array $arguments) Dynamically calls a method on the CallMorph instance.
 */
class CallMorph
{
    protected static ?CallMorphClass $instance = null;

    /**
     * Initializes the CallMorph configuration parameters.
     *
     * @param string $secret.
     *
     * @return void
     */
    public static function init(): void
    {
        if (is_null(self::$instance)) {
            $reflection = new \ReflectionClass(CallMorphClass::class);
            self::$instance = $reflection->newInstanceArgs(func_get_args());
        }
    }

    /**
     * Returns the singleton instance of CallMorph.
     * Throws an exception if the instance has not been initialized.
     *
     * @throws \Exception
     * @return CallMorph
     */
    public static function getInstance(): CallMorphClass
    {
        if (is_null(self::$instance)) {
            throw new \Exception("Facade not initialized. Use \MJohann\Packlib\Facades\CallMorph::init([...]) first.");
        }

        return self::$instance;
    }

    /**
     * Magic method to forward static calls to the underlying CallMorph instance.
     * If the method does not exist on the instance, a BadMethodCallException is thrown.
     *
     * @param string $method
     * @param array $arguments
     * @throws \BadMethodCallException
     * @return mixed
     */
    public static function __callStatic($method, $arguments): mixed
    {
        $instance = self::getInstance();

        if (!method_exists($instance, $method)) {
            throw new \BadMethodCallException("Method {$method} not exist in CallMorph.");
        }

        return $instance->$method(...$arguments);
    }
}
