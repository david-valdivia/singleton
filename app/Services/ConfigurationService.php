<?php

namespace App\Services;

/**
 * ConfigurationService - A Singleton Pattern Implementation
 * 
 * This service ensures only one instance exists throughout the application lifecycle.
 * It demonstrates the Singleton design pattern in PHP/Laravel.
 */
class ConfigurationService
{
    /**
     * The single instance of this class
     */
    private static ?ConfigurationService $instance = null;

    /**
     * Configuration data storage
     */
    private array $config = [];

    /**
     * Private constructor to prevent direct instantiation
     */
    private function __construct()
    {
        // Initialize with some default configuration
        $this->config = [
            'app_name' => 'Singleton Pattern Demo',
            'version' => '1.0.0',
            'environment' => 'development',
        ];
    }

    /**
     * Prevent cloning of the instance
     */
    private function __clone()
    {
    }

    /**
     * Prevent unserialization of the instance
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize singleton");
    }

    /**
     * Get the singleton instance
     */
    public static function getInstance(): ConfigurationService
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Set a configuration value
     */
    public function set(string $key, mixed $value): void
    {
        $this->config[$key] = $value;
    }

    /**
     * Get a configuration value
     */
    public function get(string $key, mixed $default = null): mixed
    {
        return $this->config[$key] ?? $default;
    }

    /**
     * Get all configuration
     */
    public function all(): array
    {
        return $this->config;
    }

    /**
     * Check if a configuration key exists
     */
    public function has(string $key): bool
    {
        return isset($this->config[$key]);
    }
}
