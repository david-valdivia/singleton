<?php

namespace App\Http\Controllers;

use App\Services\ConfigurationService;
use Illuminate\Http\JsonResponse;

class SingletonController extends Controller
{
    /**
     * Display the singleton pattern demonstration
     */
    public function index(): JsonResponse
    {
        // Get the first instance
        $config1 = ConfigurationService::getInstance();
        $config1->set('demo', 'This is set from the first instance');
        
        // Get the second instance - should be the same instance
        $config2 = ConfigurationService::getInstance();
        
        // Verify they are the same instance
        $areSameInstance = $config1 === $config2;
        
        // The value set in config1 should be accessible from config2
        $valueFromConfig2 = $config2->get('demo');
        
        // Get all configuration
        $allConfig = $config2->all();
        
        return response()->json([
            'message' => 'Singleton Pattern Demonstration',
            'are_same_instance' => $areSameInstance,
            'value_from_first_instance' => $config1->get('demo'),
            'value_from_second_instance' => $valueFromConfig2,
            'all_configuration' => $allConfig,
            'instance_id_1' => spl_object_id($config1),
            'instance_id_2' => spl_object_id($config2),
            'explanation' => 'Both instance IDs are the same, proving it\'s a singleton. The value set in the first instance is accessible from the second instance.'
        ]);
    }
}
