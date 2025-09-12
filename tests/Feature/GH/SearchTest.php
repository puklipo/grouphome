<?php

namespace Tests\Feature\GH;

use App\Models\Home;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SearchTest extends TestCase
{
    use RefreshDatabase;

    public function test_search()
    {
        $this->seed();

        $home = Home::factory()->create();

        $response = $this->get(route('index', ['q' => $home->name]));

        $response->assertOk()
            ->assertSeeText($home->name);
    }
}
