<?php

namespace Tests\Feature\GH;

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

        $this->artisan('gh:import')
            ->assertSuccessful();

        $this->assertDatabaseCount('prefs', 47);
        $this->assertDatabaseCount('types', 4);
    }

    public function test_delete()
    {
        Bus::fake();

        $this->seed();

        $this->artisan('gh:delete')
            ->assertSuccessful();
    }
}
