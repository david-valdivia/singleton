<?php

namespace Tests\Feature;

use Tests\TestCase;

class SingletonControllerTest extends TestCase
{
    public function test_singleton_demo_endpoint_returns_successful_response(): void
    {
        $response = $this->get('/singleton-demo');

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Singleton Pattern Demonstration',
            'are_same_instance' => true,
        ]);
    }

    public function test_singleton_demo_endpoint_shows_same_instance_ids(): void
    {
        $response = $this->get('/singleton-demo');

        $data = $response->json();

        $this->assertEquals($data['instance_id_1'], $data['instance_id_2']);
    }

    public function test_singleton_demo_endpoint_returns_expected_structure(): void
    {
        $response = $this->get('/singleton-demo');

        $response->assertJsonStructure([
            'message',
            'are_same_instance',
            'value_from_first_instance',
            'value_from_second_instance',
            'all_configuration',
            'instance_id_1',
            'instance_id_2',
            'explanation',
        ]);
    }

    public function test_singleton_demo_shows_shared_state(): void
    {
        $response = $this->get('/singleton-demo');

        $data = $response->json();

        $this->assertEquals(
            $data['value_from_first_instance'],
            $data['value_from_second_instance']
        );
    }
}
