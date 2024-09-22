<?php

namespace Tests\Feature;

use App\Services\Providers\Leadbook\ApiClient;
use Database\Factories\EventsFactory;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

class ApiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        app()->instance(
            ApiClient::class,
            Mockery::mock(ApiClient::class, function (MockInterface $mock) {
                /** @var EventsFactory $factory */
                $factory = app()->make(EventsFactory::class);

                $events = [
                    $factory->create(),
                    $factory->create(),
                ];

                $mock->shouldReceive('makeRequest')
                    ->once()
                    ->andReturn(['response' => $events]);
            })
        );
    }

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('api/v1/show/event?showId=12');

        $response->assertStatus(200);
    }
}
