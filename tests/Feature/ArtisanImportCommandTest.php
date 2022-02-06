<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Bus;
use Tests\TestCase;

class ArtisanImportCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_import_csv()
    {
        Bus::fake();

        $this->seed();

        $this->artisan('import')
             ->assertSuccessful();

        $this->assertDatabaseCount('prefs', 47);
        $this->assertDatabaseCount('types', 4);
    }
}
