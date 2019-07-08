<?php

namespace Novadevs\Simultra\Base\Http\Controllers;

use Novadevs\Simultra\Base\Models\WhTool;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class WhToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $o = WhTool::all();
        return view('whtool.index')->with('o', $o);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('whtool.create');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [ 
                'name'=>'required',
                'identifier' => 'required',
            ]
        );
        
        try {
            $o = new WhTool($request->all());
            // Active/Inactive checkbox validation
            ($request->in_use == 'on') ? $o->in_use = true : $o->in_use = false;
            $o->save();
            // Generating flash message
            $request->session()->flash('message', 'Registro creado satisfactoriamente'); 
            $request->session()->flash('alert-class', 'alert-success'); 
        } catch (\Exception $e) {
             // Generating flash message
            $request->session()->flash('message', '<strong>Error!</strong> ' . $e->getMessage()); 
            $request->session()->flash('alert-class', 'alert-danger'); 
        }

        return redirect()->route('whtool.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WhTool $whtool
     * @return \Illuminate\Http\Response
     */
    public function show(WhTool $whtool)
    {
        $o = WhTool::find($whtool->id);
        return view('whtool.show')->with('o', $o);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WhTool $whtool
     * @return \Illuminate\Http\Response
     */
    public function edit(WhTool $whtool)
    {
        $o = WhTool::find($whtool->id);
        return view('whtool.edit')->with('o', $o);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WhTool $whtool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WhTool $whtool)
    {
        $this->validate($request,
            [ 
                'name'=>'required',
                'identifier' => 'required',
            ]
        );
        try {
            WhTool::find($whtool->id)->update($this->handleRequest($request));

            // Generating flash message
            $request->session()->flash('message', 'Registro actualizado satisfactoriamente'); 
            $request->session()->flash('alert-class', 'alert-success'); 
        } catch (\Exception $e) {
             // Generating flash message
            $request->session()->flash('message', '<strong>Error!</strong> ' . $e->getMessage()); 
            $request->session()->flash('alert-class', 'alert-danger'); 
        }
        
        return redirect()->route('whtool.index', $whtool->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WhTool $whtool
     * @return \Illuminate\Http\Response
     */
    public function destroy(WhTool $whtool, Request $request)
    {
        try {
            WhTool::find($whtool->id)->delete();
            $request->session()->flash('message', 'Registro borrado satisfactoriamente'); 
            $request->session()->flash('alert-class', 'alert-info'); 
        } catch (\Exception $e) {
            $request->session()->flash('message', '<strong>Error!</strong> ' . $e->getMessage()); 
            $request->session()->flash('alert-class', 'alert-danger'); 
        }

        return redirect()->route('whtool.index');
    }

    /**
     * Handle some special form fields as inputs inside another inputs , etc...
     *
     * @param Request $request
     * @return array $result
     */
    public function handleRequest(Request $request)
    {        
        $result = get_object_vars($request);
        $result = $result['request']->all();

        if (isset($result['in_use'])) {  //FIXME
            if ($result['in_use'] == 'on') {
                $result['in_use'] = true;
            }
        } else {
            $result['in_use'] = false;
        }
        return $result;
    }
}
