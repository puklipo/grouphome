<?php

namespace Tests\Feature;

use App\Actions\History;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_area()
    {
        $response = $this->get(route('area.index'));

        $response->assertStatus(200);
    }

    public function test_history()
    {
        $history = app(History::class)->get();

        $this->assertTrue($history->isEmpty());

        $response = $this->get(route('history'));

        $response->assertStatus(200);
    }
}
