<?php

namespace Novadevs\Simultra\Base\Http\Controllers;

use Novadevs\Simultra\Base\Models\Warehouse;
use Novadevs\Simultra\Base\Models\WhTool;
use Novadevs\Simultra\Base\Models\StockMove;
use Novadevs\Simultra\Base\Models\Product;
use Novadevs\Simultra\Base\Models\Location;
use Novadevs\Simultra\Base\Models\Transfer;
use Novadevs\Simultra\Base\Models\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $o = Transfer::all();
        
        return view('transfer.index')->with('o', $o);
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
        $pa = Partner::all();
        // TODO
        // $pa = Partner::all();
        return view('transfer.create')->with('p', $p)
                                      ->with('pa', $pa)
                                      ->with('l', $l);
                                  //  ->with('pa', $pa)
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
                'partner'=>'required',
                'product' => 'required',
                'reference' => 'required',
                'qty' => 'required:integer',
            ]
        );

        try {
            $o = new Transfer($this->handleRequest($request));

            $o->save();
            // Generating flash message
            $request->session()->flash('message', 'Registro creado satisfactoriamente'); 
            $request->session()->flash('alert-class', 'alert-success'); 
        } catch (\Exception $e) {
             // Generating flash message
            $request->session()->flash('message', '<strong>Error!</strong> ' . $e->getMessage()); 
            $request->session()->flash('alert-class', 'alert-danger'); 
        }

        return redirect()->route('transfer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function show(Transfer $transfer)
    {
        $o = Transfer::find($transfer->id);
        return view('transfer.show')->with('o', $o);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transfer $transfer
     * @return \Illuminate\Http\Response
     */
    public function edit(Transfer $transfer)
    {
        $o = Transfer::find($transfer->id);
        $p = Product::all();
        $l = Location::all();
        $pa = Partner::all();

        return view('transfer.edit')->with('o', $o)
                                    ->with('p', $p)
                                    ->with('pa', $pa)
                                    ->with('l', $l);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transfer $transfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transfer $transfer)
    {
        $this->validate($request,
            [ 
                'partner'=>'required',
                'product' => 'required',
                'reference' => 'required',
                'qty' => 'required:integer',
            ]
        );

        try {
            Transfer::find($transfer->id)->update($this->handleRequest($request, $transfer));
            // Generating flash message
            $request->session()->flash('message', 'Registro actualizado satisfactoriamente'); 
            $request->session()->flash('alert-class', 'alert-success'); 
        } catch (\Exception $e) {
             // Generating flash message
            $request->session()->flash('message', '<strong>Error!</strong> ' . $e->getMessage()); 
            $request->session()->flash('alert-class', 'alert-danger'); 
        }
        
        return redirect()->route('transfer.index', $transfer->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transfer $transfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transfer $transfer, Request $request)
    {
        try {
            Transfer::find($transfer->id)->delete();
            \Storage::delete($transfer->source_document);
            $request->session()->flash('message', 'Registro borrado satisfactoriamente'); 
            $request->session()->flash('alert-class', 'alert-info'); 
        } catch (\Exception $e) {
            $request->session()->flash('message', '<strong>Error!</strong> ' . $e->getMessage()); 
            $request->session()->flash('alert-class', 'alert-danger'); 
        }

        return redirect()->route('transfer.index');
    }


    /**
     * Undocumented function
     *
     * @param Request $request
     * @param Transfer $transfer
     * @return void
     */
    public function handleRequest(Request $request, Transfer $transfer = null)
    {
        $result = get_object_vars($request);
        $result = $result['request']->all();

        if (isset($result['status'])) {
            if ($result['status'] == 'on') {
                $result['status'] = true;
                $this->validateTransfer($transfer, $request);
            }
        } else {
            $result['status'] = false;
        }

        // File upload and storage handling
        if ( isset($request->source_document) ){
            $path = $request->file('source_document')->store('public/transfers');        
            $result['source_document'] = $path;
        }
        return $result;
    }

    /**
     * Transfer validation, adjust the product qty for each location (pivot table)
     *
     * @param Transfer $transfer
     * @return void
     */
    public function validateTransfer(Transfer $transfer, Request $request)
    {
        $p = Product::find($transfer->product);

        if ( $transfer->sourceLocation->location_type == 1 && $transfer->destinationLocation->location_type == 1 ) { // OK
            // +
            // from supplier location to supplier location
            $p->qty_on_hand = $p->qty_on_hand + $transfer->qty;

        } elseif ( $source_location->location_type == 2 && $destination_location->location_type == 3 ) {
            // -
            // from internal location to customer location
            $p->qty_on_hand = $p->qty_on_hand - $request->qty;

        } elseif ( $source_location->location_type == 2 && $destination_location->location_type == 2 ) {
            // =
            // from internal stock to internal stock
            $p->qty_on_hand = $p->qty_on_hand + 0;
        } elseif ( $source_location->location_type == 1 && $destination_location->location_type == 2 ) {
            // +
            // from supplier location to internal location
            $p->qty_on_hand = $p->qty_on_hand + $request->qty;
        } elseif ( $source_location->location_type == 1 && $destination_location->location_type == 3 ) {
            // =
            // from supplier to customer
            $p->qty_on_hand = $p->qty_on_hand + 0;
        } else {

            $request->session()->flash('message', '<strong>Error!</strong> ' . $e->getMessage()); 
            $request->session()->flash('alert-class', 'alert-danger'); 
            return false;
        }

        try {
            $p->save();
            $p->locations()->attach($transfer->sourceLocation->id, ['qty' => $transfer->qty]);

            $request->session()->flash('message', 'Registro borrado satisfactoriamente'); 
            $request->session()->flash('alert-class', 'alert-info'); 
        } catch (\Exception $e) {
            $request->session()->flash('message', '<strong>Error!</strong> ' . $e->getMessage()); 
            $request->session()->flash('alert-class', 'alert-danger'); 
        }
    }
}