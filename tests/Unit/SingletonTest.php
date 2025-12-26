<?php

namespace Tests\Unit;

use App\Services\ConfigurationService;
use PHPUnit\Framework\TestCase;

class SingletonTest extends TestCase
{
    protected function tearDown(): void
    {
        parent::tearDown();
        
        // Reset the singleton instance after each test
        $reflection = new \ReflectionClass(ConfigurationService::class);
        $instance = $reflection->getProperty('instance');
        $instance->setAccessible(true);
        $instance->setValue(null, null);
    }

    public function test_singleton_returns_same_instance(): void
    {
        $instance1 = ConfigurationService::getInstance();
        $instance2 = ConfigurationService::getInstance();

        $this->assertSame($instance1, $instance2);
        $this->assertEquals(spl_object_id($instance1), spl_object_id($instance2));
    }

    public function test_singleton_shares_state(): void
    {
        $instance1 = ConfigurationService::getInstance();
        $instance1->set('test_key', 'test_value');

        $instance2 = ConfigurationService::getInstance();
        
        $this->assertEquals('test_value', $instance2->get('test_key'));
    }

    public function test_singleton_set_and_get(): void
    {
        $config = ConfigurationService::getInstance();
        
        $config->set('custom_key', 'custom_value');
        
        $this->assertEquals('custom_value', $config->get('custom_key'));
        $this->assertNull($config->get('non_existent_key'));
        $this->assertEquals('default', $config->get('non_existent_key', 'default'));
    }

    public function test_singleton_has_method(): void
    {
        $config = ConfigurationService::getInstance();
        
        $config->set('existing_key', 'value');
        
        $this->assertTrue($config->has('existing_key'));
        $this->assertFalse($config->has('non_existent_key'));
    }

    public function test_singleton_all_method(): void
    {
        $config = ConfigurationService::getInstance();
        
        $config->set('key1', 'value1');
        $config->set('key2', 'value2');
        
        $all = $config->all();
        
        $this->assertIsArray($all);
        $this->assertArrayHasKey('key1', $all);
        $this->assertArrayHasKey('key2', $all);
        $this->assertEquals('value1', $all['key1']);
        $this->assertEquals('value2', $all['key2']);
    }

    public function test_singleton_default_configuration(): void
    {
        $config = ConfigurationService::getInstance();
        
        $this->assertEquals('Singleton Pattern Demo', $config->get('app_name'));
        $this->assertEquals('1.0.0', $config->get('version'));
        $this->assertEquals('development', $config->get('environment'));
    }
}
