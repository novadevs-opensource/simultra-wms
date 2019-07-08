<?php

namespace Novadevs\Simultra\Base\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Novadevs\Simultra\Base\Models\BaseCompany;

class BaseCompanyController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setup.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO: Check if company is already configured, do we need it?
        try {
            $bc = new BaseCompany($this->handleRequest($request));
            $bc->save();
            // Generating flash message
            $request->session()->flash('message', 'Registro creado satisfactoriamente'); 
            $request->session()->flash('alert-class', 'alert-success'); 
        } catch (\Exception $e) {
             // Generating flash message
            $request->session()->flash('message', '<strong>Error!</strong> ' . $e->getMessage()); 
            $request->session()->flash('alert-class', 'alert-danger'); 
        }

        return redirect()->route('setup.company.show', 1);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id (always 1)
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bc = BaseCompany::findOrFail($id);
        return view('setup.company.show')->with('bc', $bc);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bc = BaseCompany::findOrFail($id);
        return view('setup.company.edit')->with('bc', $bc);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (isset($request->logo)) {
            $this->validate($request,[ 
                'name' => 'required',
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]
            );
        } else {
            $this->validate($request,[ 
                'name' => 'required',
                ]
            );
        }

        try {
            BaseCompany::find($id)->update($this->handleRequest($request));
            // Generating flash message
            $request->session()->flash('message', 'Registro actualizado satisfactoriamente'); 
            $request->session()->flash('alert-class', 'alert-success'); 
        } catch (\Exception $e) {
             // Generating flash message
            $request->session()->flash('message', '<strong>Error!</strong> ' . $e->getMessage()); 
            $request->session()->flash('alert-class', 'alert-danger'); 
        }
        
        return redirect()->route('setup.company.show', $id);
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

        if ($request->localtax1_in_use) {
            $lt1Data = array(
                'localtax1_in_use' => true,
                'localtax1_in_use_val_1' => $request->localtax1_in_use_val_1,
            );
            unset($result['localtax1_in_use_val_1']);
            $result['localtax1_in_use'] = json_encode($lt1Data);
        } else {
            $lt1Data = array(
                'localtax1_in_use' => true,
            );
            unset($result['localtax1_in_use_val_1']);
        }

        if ($request->localtax2_in_use) {
            $lt2Data = array(
                'localtax2_in_use' => true,
                'localtax2_in_use_val_1' => $request->localtax2_in_use_val_1,
                'localtax2_in_use_val_2' => $request->localtax2_in_use_val_2,
            );
            unset($result['localtax2_in_use_val_1']);
            unset($result['localtax2_in_use_val_2']);

            $result['localtax2_in_use'] = json_encode($lt2Data);
        } else {
            $result = array(
                'localtax2_in_use' => true,
            );
            unset($result['localtax2_in_use_val_1']);
            unset($result['localtax2_in_use_val_2']);
        }

        if ($result['vat_in_use'] == 'on') {
            $result['vat_in_use'] = true;
        } else {
            $result['vat_in_use'] = false;
        }

        // Logo upload and storage handling
        if ( isset($request->logo) ){
            $path = $request->file('logo')->store('avatar','public');
            $result['logo'] = $path;
        }
        
        return $result;
    }
}
