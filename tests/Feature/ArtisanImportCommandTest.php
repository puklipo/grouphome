<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArtisanImportCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_download_csv()
    {
        $this->artisan('download')
             ->assertSuccessful();
    }

    public function test_import_csv()
    {
        $this->seed();

        $this->artisan('import')
             ->assertSuccessful();

        $this->assertDatabaseCount('prefs', 47);
        $this->assertDatabaseCount('types', 4);
    }
}
