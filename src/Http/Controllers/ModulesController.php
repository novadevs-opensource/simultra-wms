<?php

namespace Novadevs\Simultra\Base\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Novadevs\Simultra\Base\Models\Module;
use Novadevs\Simultra\Base\Repositories\ModuleRepository;


class ModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $m = Module::all();
        return view('setup.setup-modules')->with('modules', $m);
    }


    /**
     * Returns the module status as string, fired from setup-modules.blade.php
     *
     * @param integer $id
     * @return string
     */
    public function getModuleStatus($id)
    {
        $m = Module::find($id);
        $r = new ModuleRepository($m);
        $r = $r->getModuleStatus($m);

        return ($r) ? "Enabled" : "Disabled" ;
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
        $m = Module::all();

        // Without the following "validation hack" any module can't be disabled (probably caused by "view switcher")
        if ($request->status) {
            $this->validate($request,[ 'status'=>'required']);
            $request->replace(['status' => true]);
        } else {
            $request->replace(['status' => false]);
        }
        
        try {
            $mod = Module::find($id);
            Module::find($id)->update($request->all());

            // Generating flash message
            $request->session()->flash('message', 'Registro actualizado satisfactoriamente'); 
            $request->session()->flash('alert-class', 'alert-success'); 
        } catch (\Exception $e) {
             // Generating flash message
            $request->session()->flash('message', '<strong>Error!</strong> ' . $e->getMessage()); 
            $request->session()->flash('alert-class', 'alert-danger'); 
        }
        
        return view('setup.setup-modules')->with('modules', $m);
    }
}