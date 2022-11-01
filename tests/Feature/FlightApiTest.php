<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FlightApiTest extends TestCase
{
    public function test_flights_api()
    {
        $response = $this->getJson('/api/fr/vol');

        $response
            ->assertStatus(200)
            ->assertJson([
                'created' => true,
            ]);
    }
}
