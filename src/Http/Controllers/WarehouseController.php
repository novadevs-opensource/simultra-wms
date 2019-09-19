<?php

namespace Novadevs\Simultra\Base\Http\Controllers;

use Novadevs\Simultra\Base\Models\Warehouse;
use Novadevs\Simultra\Base\Models\Transfer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function home()
    {
        $o = Transfer::all();
        $r = array();
        $d = array();

        if ( count($o) > 0 ) {
            foreach ($o as $i) {
                if ($i->sourceLocation->location_type == 1 && $i->status == 0) {
                    array_push($r, $i);
                }
                if ($i->sourceLocation->location_type == 3  && $i->status == 0) {
                    array_push($d, $i);
                }
            }
    
            $totalReceipts = 0;
            $totalDelivers = 0;
    
            foreach ($r as $i) {
                $totalReceipts = $totalReceipts + $i->qty;
            }
    
            foreach ($d as $i) {
                $totalDelivers = $totalDelivers + $i->qty;
            }
    
            return view('warehouse.home')->with('r', $totalReceipts)
                                         ->with('d', $totalDelivers);
        } else {
            $whs = Warehouse::all();
            return view('warehouse.index')->with('whs', $whs);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $whs = Warehouse::all();
        return view('warehouse.index')->with('whs', $whs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('warehouse.create');
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
            $bc = new Warehouse($request->all());
            $bc->save();
        
            saveReport('[P.3.1]', '3', __('Creating warehouse ' . $bc->name . '.'), null, 1);

            // Generating flash message
            $request->session()->flash('message', 'Registro creado satisfactoriamente'); 
            $request->session()->flash('alert-class', 'alert-success'); 
        } catch (\Exception $e) {
             // Generating flash message
            $request->session()->flash('message', '<strong>Error!</strong> ' . $e->getMessage()); 
            $request->session()->flash('alert-class', 'alert-danger'); 
        }

        return redirect()->route('warehouse.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function show(Warehouse $warehouse)
    {
        $o = Warehouse::find($warehouse->id);
        return view('warehouse.show')->with('o', $o);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Warehouse $warehouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warehouse $warehouse)
    {
        //
    }
}
