<?php

/*
	GitHub: https://github.com/matheusjohannaraujo/call-morph
	Country: Brasil
	State: Pernambuco
	Developer: Matheus Johann Araujo
	Date: 2025-04-22
*/

namespace MJohann\Packlib;

class CallMorph
{

    /**
     * The secret key used to (de)serialize closures.
     *
     * @var string|null
     */
    private $secret = null;

    /**
     * Constructor to initialize the secret key.
     *
     * @param string $secret The secret key to use for closure serialization.
     */
    public function __construct(string $secret)
    {
        $this->secret = $secret;
    }

    /**
     * Gets the current secret key.
     *
     * @return string The current secret key.
     */
    public function getSecret(): string
    {
        return $this->secret;
    }

    /**
     * Sets the secret key for serialization.
     *
     * @param string $secret The new secret key to set.
     * @return void
     */
    public function setSecret(string $secret): void
    {
        $this->secret = $secret;
    }

    /**
     * Serializes a Closure using either Laravel's or Opis's method,
     * depending on the PHP version.
     *
     * @param \Closure $callback The Closure to serialize.
     * @return string The serialized string representation of the Closure.
     */
    public function serialize(\Closure $callback): string
    {
        $ver = (float) phpversion();
        if ($ver >= 8.1) {
            \Laravel\SerializableClosure\SerializableClosure::setSecretKey($this->secret);
            return serialize(new \Laravel\SerializableClosure\SerializableClosure($callback));
        }
        return \Opis\Closure\serialize($callback);
    }

    /**
     * Unserializes a previously serialized Closure string.
     * Uses different libraries depending on the PHP version.
     *
     * @param string $callback The serialized Closure string.
     * @return \Closure The restored Closure.
     */
    public function unserialize(string $callback): \Closure
    {
        $ver = (float) phpversion();
        if ($ver >= 8.1) {
            \Laravel\SerializableClosure\SerializableClosure::setSecretKey($this->secret);
            return unserialize($callback)->getClosure();
        }
        return \Opis\Closure\unserialize($callback);
    }
}
