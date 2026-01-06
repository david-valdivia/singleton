<?php
namespace App\Services;

/*
    Singleton Ensures a class has only one instance throughout the application's lifetime
    and provides a global point of access to it.
*/

/* Lazy Initialization */
/* State Preservation */

class ClassicSingleton
{
    // 1. Private static property to hold the instance
    private static ?ClassicSingleton $instance = null;

    // 2. Private constructor prevents direct instantiation
    private function __construct()
    {
        // Connection logic here
    }

    // 3. Private clone method prevents cloning
    private function __clone() {}

    // 4. Private unserialize prevents unserialization
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize singleton");
    }

    // 5. Public static method to get the instance
    public static function getInstance(): ClassicSingleton
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    // Your business logic
    public function query(string $sql)
    {
        // Execute query
    }
}

// Usage
//$db = ClassicSingleton::getInstance();
