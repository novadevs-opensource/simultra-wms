<?php

namespace Novadevs\Simultra\Base\Http\Controllers;

use Novadevs\Simultra\Base\Models\Partner;
use Novadevs\Simultra\Base\Models\Warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $o = Partner::all();
        return view('partner.index')->with('o', $o);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $w = Warehouse::all();
        return view('partner.create')->with('w', $w);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $o = new Partner($request->all());
            $o->save();
            // Generating flash message
            $request->session()->flash('message', 'Registro creado satisfactoriamente'); 
            $request->session()->flash('alert-class', 'alert-success'); 
        } catch (\Exception $e) {
             // Generating flash message
            $request->session()->flash('message', '<strong>Error!</strong> ' . $e->getMessage()); 
            $request->session()->flash('alert-class', 'alert-danger'); 
        }

        return redirect()->route('partner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        $o = Partner::find($partner->id);
        return view('partner.show')->with('o', $o);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        $o = Partner::find($partner->id);
        $w = Warehouse::All();
        return view('partner.edit')->with('o', $o)
                                   ->with('w', $w);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $this->validate($request,[ 'name'=>'required']);

        try {
            Partner::find($partner->id)->update($request->all());

            // Generating flash message
            $request->session()->flash('message', 'Registro actualizado satisfactoriamente'); 
            $request->session()->flash('alert-class', 'alert-success'); 
        } catch (\Exception $e) {
             // Generating flash message
            $request->session()->flash('message', '<strong>Error!</strong> ' . $e->getMessage()); 
            $request->session()->flash('alert-class', 'alert-danger'); 
        }
        
        return redirect()->route('partner.index', $partner->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        //
    }
}