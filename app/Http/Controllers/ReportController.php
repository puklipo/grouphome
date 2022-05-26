<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $report
     * @return mixed
     */
    public function __invoke(Request $request, int $report)
    {
        abort_unless(file_exists(resource_path('views/report/'.$report.'.blade.php')),404);

        return view('report.'.$report);
    }
}
