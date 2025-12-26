<?php

namespace Tests\Feature;

use App\Services\SlackService;
use PHPUnit\Framework\MockObject\Exception;
use Tests\TestCase;

class SlackTest extends TestCase
{
    /**
     * @throws Exception
     */
    protected function test_send_message(): void
    {
        $mock = $this->createMock(SlackService::class);
        $mock->method('send')
            ->with('Test message')
            ->willReturn(true);

        $this->app->instance(SlackService::class, $mock);

        $this->postJson(route('slack.store'), ['message' => 'Test message'])
            ->assertStatus(200)
            ->assertJson(['success' => true]);
    }
}
