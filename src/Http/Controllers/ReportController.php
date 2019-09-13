<?php

namespace Novadevs\Simultra\Base\Http\Controllers;

use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Novadevs\Simultra\Base\Models\Report;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $o = Report::all();
        $t = new Report();

        return view('report.index')->with('o', $o);
    }

    public function create(Request $request)
    {
        $o = new Record();
    }

    public function show(Request $request, Report $report)
    {
        $o = Report::find($report->id);
        return view('report.show')->with('o', $o);
    }
}
