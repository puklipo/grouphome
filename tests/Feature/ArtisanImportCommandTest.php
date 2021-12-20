<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArtisanImportCommandTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_import_csv()
    {
        $this->seed();

        $this->artisan('import:csv')
            ->expectsOutput('tokyo')
            ->assertSuccessful();

        $this->assertDatabaseCount('prefs', 47);
        $this->assertDatabaseCount('types', 3);
    }
}
