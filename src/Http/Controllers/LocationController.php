<?php

namespace Novadevs\Simultra\Base\Http\Controllers;

use Novadevs\Simultra\Base\Models\Location;
use Novadevs\Simultra\Base\Models\Product;
use Novadevs\Simultra\Base\Models\Warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loc = Location::all();
        return view('location.index')->with('loc', $loc);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $o = Location::all();
        return view('location.create')->with('o', $o);
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
                'localization_x' => 'required',
                'localization_y' => 'required',
                'localization_z' => 'required',
                'location_barcode' => 'required',
                'additional_information' => 'required',
            ]
        );
        try {
            $loc = new Location($request->all());
            // Active/Inactive checkbox validation
            ($request->active == 'on') ? $loc->active = true : $loc->active = false;
            $loc->save();
            // Generating flash message
            $request->session()->flash('message', 'Registro creado satisfactoriamente'); 
            $request->session()->flash('alert-class', 'alert-success'); 
        } catch (\Exception $e) {
             // Generating flash message
            $request->session()->flash('message', '<strong>Error!</strong> ' . $e->getMessage()); 
            $request->session()->flash('alert-class', 'alert-danger'); 
        }

        return redirect()->route('location.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        $loc = Location::find($location->id);
        return view('location.show')->with('loc', $loc);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        $o = Location::all();
        $w = Warehouse::all();
        $loc = Location::find($location->id);
        return view('location.edit')->with('loc', $loc)
                                    ->with('o', $o)
                                    ->with('w', $w);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        $this->validate($request,
            [ 
                'name'=>'required',
                'localization_x' => 'required',
                'localization_y' => 'required',
                'localization_z' => 'required',
                'location_barcode' => 'required',
                'additional_information' => 'required',
            ]
        );
        
        try {
            Location::find($location->id)->update($this->handleRequest($request));
            // Generating flash message
            $request->session()->flash('message', 'Registro actualizado satisfactoriamente'); 
            $request->session()->flash('alert-class', 'alert-success'); 
        } catch (\Exception $e) {
             // Generating flash message
            $request->session()->flash('message', '<strong>Error!</strong> ' . $e->getMessage()); 
            $request->session()->flash('alert-class', 'alert-danger'); 
        }
        
        return redirect()->route('location.index', $location->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @throws Exception 
     *      - SQLSTATE[23000]: Integrity constraint violation. 
     *        When the location has some product stored on it.
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location, Request $request)
    {
        $l = Location::find($location->id);

        try {
            $l->delete();

            $request->session()->flash('message', 'Registro borrado satisfactoriamente'); 
            $request->session()->flash('alert-class', 'alert-info'); 
            
        } catch (\Exception $e) {
            if ( $e->getCode() == 23000 ) {
                try {
                    $l->products()->newPivotStatement()->where('location_id', $location->id)->delete();
                    $l->delete();

                    $request->session()->flash('message', 'Registro borrado satisfactoriamente'); 
                    $request->session()->flash('alert-class', 'alert-info');

                } catch (\Throwable $th) {
                    $request->session()->flash('message', '<strong>Error!</strong> ' . $e->getMessage()); 
                    $request->session()->flash('alert-class', 'alert-danger'); 
                    
                }
            } else {
                $request->session()->flash('message', '<strong>Error!</strong> ' . $e->getMessage()); 
                $request->session()->flash('alert-class', 'alert-danger'); 
            }
        }

        return redirect()->route('location.index');
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

        if ($result['active'] == 'on') {
            $result['active'] = true;
        } else {
            $result['active'] = false;
        }
        
        return $result;
    }
}