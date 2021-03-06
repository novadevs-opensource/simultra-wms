<?php

namespace Novadevs\Simultra\Base\Http\Controllers;

use Novadevs\Simultra\Base\Models\Product;
use Novadevs\Simultra\Base\Models\StockMove;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p = Product::all();
        return view('product.index')->with('p', $p);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
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
                'name'                  => 'required',
                'price'                 => 'required|numeric',
                'ean13'                 => 'required|numeric|digits:13',
                'internal_reference'    => 'required',
                'qty_forecasted'        => 'required|numeric|min:1|max:99999',
                'date_of_expiry'        => 'required_if:perishable,on'
            ]
        );

        try {
            $o = new Product($request->all());
            $o->qty_on_hand = 0;
            // Active/Inactive checkbox validation
            ($request->perishable == 'on') ? $o->perishable = true : $o->perishable = false;
            ($request->active == 'on') ? $o->active = true : $o->active = false;
            ($request->for_sale == 'on') ? $o->for_sale = true : $o->for_sale = false;

            $o->save();

            //Saving report
            saveReport('[P.1.2]', '2', __('Creating product'), checkMode($request), 3, $o);

            // Generating flash message
            $request->session()->flash('message', 'Registro creado satisfactoriamente'); 
            $request->session()->flash('alert-class', 'alert-success'); 
        } catch (\Exception $e) {
             // Generating flash message
            $request->session()->flash('message', '<strong>Error!</strong> ' . $e->getMessage()); 
            $request->session()->flash('alert-class', 'alert-danger'); 
        }

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products $products
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $o = Product::find($product->id);
        return view('product.show')->with('o', $o);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $o = Product::find($product->id);
        return view('product.edit')->with('o', $o);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,
            [ 
                'name' => 'required',
                'price' => 'required:numeric',
                'qty_forecasted' => 'required:numeric',
                'weight_volume' => 'required:numeric',
                'weight_gross_weight' => 'required:numeric',
                'weight_net_weight' => 'required:numeric',
            ]
        );

        try {
            Product::find($product->id)->update($this->handleRequest($request));

            // Generating flash message
            $request->session()->flash('message', 'Registro actualizado satisfactoriamente'); 
            $request->session()->flash('alert-class', 'alert-success'); 
        } catch (\Exception $e) {
             // Generating flash message
            $request->session()->flash('message', '<strong>Error!</strong> ' . $e->getMessage()); 
            $request->session()->flash('alert-class', 'alert-danger'); 
        }
        
        return redirect()->route('product.index', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        $m = StockMove::where('product', $product->id)->get();
        $p = Product::find($product->id);

        try {
            // Deleting stock moves for this product
            foreach ($m as $i) {
                $i->destroy($i->id);
            }
            $p->delete();

            $request->session()->flash('message', 'Registro borrado satisfactoriamente'); 
            $request->session()->flash('alert-class', 'alert-info'); 

        } catch (\Exception $e) {
            if ( $e->getCode() == 23000 ) {
                try {
                    $p->locations()
                            ->newPivotStatement()
                            ->where('product_id', $product->id)
                            ->delete();
                    $p->delete();
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

        return redirect()->route('product.index');
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

        if (isset($result['active'])) {  //FIXME
            if ($result['active'] == 'on') {
                $result['active'] = true;
            }
        } else {
            $result['active'] = false;
        }

        if (isset($result['for_sale'])) {  //FIXME
            if ($result['for_sale'] == 'on') {
                $result['for_sale'] = true;
            }
        } else {
            $result['for_sale'] = false;
        }

        return $result;
    }

    /**
     * This function is just an AJAX request listener used by the reporting system.
     *
     * @param int $p
     * @return string
     */
    public function _productLabelReport($p) {
        $o = Product::find($p);
        switch ($o->id) {
            case 1:
                saveReport('[P.1.3]', '1', __('Printing label for product ' . $o->name . '.'), null, 3);
                break;
            
            case 5:
                saveReport('[P.5.3]', '2', __('Printing label for product ' . $o->name . '.'), null, 3);

            default:
                break;
        }
        
        return json_encode($o->name);
    }
}