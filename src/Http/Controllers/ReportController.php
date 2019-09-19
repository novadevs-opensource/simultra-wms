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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        $o = Report::find($report->id);
        
        return view('report.edit')->with('o', $o);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        try {
            Report::find($report->id)->update($this->handleRequest($request, $report));
            // Generating flash message
            $request->session()->flash('message', 'Registro actualizado satisfactoriamente'); 
            $request->session()->flash('alert-class', 'alert-success'); 
        } catch (\Exception $e) {
             // Generating flash message
            $request->session()->flash('message', '<strong>Error!</strong> ' . $e->getMessage()); 
            $request->session()->flash('alert-class', 'alert-danger'); 
        }
        
        return redirect()->route('report.show', $report->id);
    }

    /**
     * Handle some special form fields as inputs inside another inputs , etc...
     *
     * @param Request $request
     * @return array $result
     */
    public function handleRequest(Request $request, Report $report)
    {        
        $result = get_object_vars($request);
        $result = $result['request']->all();

        // Saving as PHP array (json string in db)
        $data = json_decode($report->data);
        foreach ($request->request as $k => $v) {
            // Retrieving each form value which has an id like points-*, i.e. points-5
            if ( explode('-',$k)[0] == 'points') { // ['points', '5']
                $data[explode('-',$k)[1]]->points = $v;
            }
        }
        $result['data'] = json_encode($data);

        return $result;
    }
}
