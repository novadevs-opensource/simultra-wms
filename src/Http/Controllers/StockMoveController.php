<?php

namespace Novadevs\Simultra\Base\Http\Controllers;

use Novadevs\Simultra\Base\Models\WhTool;
use Novadevs\Simultra\Base\Models\StockMove;
use Novadevs\Simultra\Base\Models\Product;
use Novadevs\Simultra\Base\Models\Location;
use Novadevs\Simultra\Base\Models\Warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockMoveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $o = StockMove::all();
        return view('stockmove.index')->with('o', $o);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $p = Product::all();
        $l = Location::all();
        return view('stockmove.create')
            ->with('p', $p)
            ->with('l', $l);
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
                'product' => 'required',
                'qty' => 'required:integer',
                'picking_type' => 'required',
                'priority' => 'required',
                'expected_date' => 'required',
                'source_location' => 'required',
                'destination_location' => 'required',
            ]
        );

        try {
            $o = new StockMove($request->all());
            $o->save();
            $this->adjustProductQty($request);
            
            // Generating flash message
            $request->session()->flash('message', 'Registro creado satisfactoriamente'); 
            $request->session()->flash('alert-class', 'alert-success'); 
        } catch (\Exception $e) {
             // Generating flash message
            $request->session()->flash('message', '<strong>Error!</strong> ' . $e->getMessage()); 
            $request->session()->flash('alert-class', 'alert-danger'); 
        }

        return redirect()->route('stockmove.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StockMove $whtool
     * @return \Illuminate\Http\Response
     */
    public function show(StockMove $stockmove)
    {
        $o = StockMove::find($stockmove->id);
        return view('stockmove.show')->with('o', $o);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StockMove $whtool
     * @return \Illuminate\Http\Response
     */
    public function edit(StockMove $stockmove)
    {
        $o = StockMove::find($stockmove->id);
        $p = Product::all();
        $l = Location::all();
        
        return view('stockmove.edit')->with('o', $o)
                                     ->with('p', $p)
                                     ->with('l', $l);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StockMove $whtool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StockMove $stockmove)
    {
        $this->validate($request,
            [ 
                'product' => 'required',
                'qty' => 'required:integer',
                'picking_type' => 'required',
                'priority' => 'required',
                'expected_date' => 'required',
                'source_location' => 'required',
                'destination_location' => 'required',
            ]
        );

        try {
            StockMove::find($stockmove->id)->update($request->all());
            $this->adjustProductQty($request);

            // Generating flash message
            $request->session()->flash('message', 'Registro actualizado satisfactoriamente'); 
            $request->session()->flash('alert-class', 'alert-success'); 
        } catch (\Exception $e) {
             // Generating flash message
            $request->session()->flash('message', '<strong>Error!</strong> ' . $e->getMessage()); 
            $request->session()->flash('alert-class', 'alert-danger'); 
        }
        
        return redirect()->route('stockmove.index', $stockmove->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StockMove $whtool
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockMove $stockmove, Request $request)
    {
        $m = StockMove::find($stockmove->id);

        $ls = Location::all();

        // Selecting the destination location by the stored stockmove destination barcode
        foreach ($ls as $i) {
            if ($i->location_barcode == $stockmove->destination_location) {
                $destination_location = $i;
            }  
        }

        try {
            $stockmove->prod->locations()->detach($destination_location->id, $stockmove->prod->id, ['qty' => $stockmove->qty]);   
            StockMove::find($stockmove->id)->delete();

            $request->session()->flash('message', 'Registro borrado satisfactoriamente'); 
            $request->session()->flash('alert-class', 'alert-info'); 
        } catch (\Exception $e) {
            $request->session()->flash('message', '<strong>Error!</strong> ' . $e->getMessage()); 
            $request->session()->flash('alert-class', 'alert-danger'); 
        }

        return redirect()->route('stockmove.index');
    }

    public function adjustProductQty(Request $request)
    {        
        $p = Product::find($request->product);
        $ls = Location::all();

        // Selecting the destination location by the submited destination barcode
        foreach ($ls as $i) {
            if ($i->location_barcode == $request->source_location) {
                $source_location = $i;
            }
            if ($i->location_barcode == $request->destination_location) {
                $destination_location = $i;
            }  
        }

        try { 
            //UPDATING EXISTING STOCK LOCATIONS PRODUCT QTYS
            foreach ($p->locations as $i) {
                if( $i->id == $source_location->id) {
                    $newQty = $i->pivot->qty - $request->qty;
                    $p->locations()->updateExistingPivot($source_location, ['qty' => $newQty]);
                }
            }
            // CREATING NEW STOCK PRODUCT LOCATIONS
            $p->locations()->attach($destination_location->id, ['qty' => $request->qty]);   
                   
        } catch (\Exception $e) {
            // Generating flash message 
            $request->session()->flash('message', '<strong>Error!</strong> ' . $e->getMessage()); 
            $request->session()->flash('alert-class', 'alert-danger'); 
            return redirect()->route('stockmove.index');
        }
    }

    public function _productLocations($p)
    {
        $p = Product::find($p);
        return json_encode($p->locations);
    }
}