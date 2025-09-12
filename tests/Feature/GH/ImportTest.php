<?php

namespace Tests\Feature\GH;

use App\Imports\WamImport;
use App\Jobs\ImportJob;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Mockery\MockInterface;
use Tests\TestCase;

class ImportTest extends TestCase
{
    use RefreshDatabase;

    public function test_dispatch_import_job()
    {
        $this->mock(WamImport::class, function (MockInterface $mock) {
            $mock->shouldReceive('import')->once();
        });

        ImportJob::dispatch();
    }

    public function test_import_import_job_fail()
    {
        $this->mock(WamImport::class, function (MockInterface $mock) {
            $mock->shouldReceive('import')->once()->andThrow(\Exception::class);
        });

        ImportJob::dispatch();
    }

    public function test_import_csv()
    {
        $this->seed();

        HeadingRowFormatter::default('none');

        $i = new WamImport();
        $i->import(__DIR__.'/../../fixture/test.csv');

        $this->assertDatabaseCount('homes', 2);
    }
}
