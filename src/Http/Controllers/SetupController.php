<?php

namespace Novadevs\Simultra\Base\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App;
use Log;
use Cookie;
use Illuminate\Http\Request;

use Novadevs\Simultra\Base\Models\BaseCompany;
use Novadevs\Simultra\Base\Models\Report;
use Novadevs\Simultra\Base\Database\Seeds\BaseSeeder;

class SetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bc = BaseCompany::find(1);
        return view('setup.setup')->with('bc', $bc);
    }

    /**
     * Sets the wanted language
     *
     * @param string $locale
     * @param Request $request
     * @return void
     */
    public function selectLanguage($locale, Request $request)
    {
        App::setLocale($locale);
        
        $cookie = cookie('locale', $locale, time() + (10 * 365 * 24 * 60 * 60)); // Setting cookie for ten years
        session()->put('locale', $locale); //storing the locale in session to get it back in the middleware
        
        return redirect()->back()->cookie($cookie); // Attaching the new cookie to the response
    }

    /**
     * Restores default database
     *
     * @param object $request
     * @return void
     */
    public function resetDefault(Request $request)
    {
        $s = new BaseSeeder();

        try {
            $s->run(); 
            $request->session()->flash('message', __('Datos restaurados satisfactoriamente')); 
            $request->session()->flash('alert-class', 'alert-success');
        } catch (\Throwable $th) {
            $request->session()->flash('message', '<strong>Error!</strong> ' . $e->getMessage()); 
            $request->session()->flash('alert-class', 'alert-danger');
        }

        return redirect()->back();
    }

    /**
     * Change mode status, can be 1 ("demo") or 2 ("quest")
     *
     * @param Request $request['mode'] 1 | 2
     * @return void
     */
    public function quest(Request $request)
    {
        if ( $request->route('mode') ) {
            if ( $request->cookie('mode') ) {
                $cookie = cookie('mode', $request->route('mode'), time() + (10 * 365 * 24 * 60 * 60));
            } else {
                $cookie = cookie('mode', $request->route('mode'), time() + (10 * 365 * 24 * 60 * 60));
            }

            if ( $request->route('mode') == 2 ) {
                Report::_new();
                saveReport('START', false, 'Quest started', checkMode($request), 1);
            }

            if ( $request->route('mode') == 1 ) {
                saveReport('END', false, 'Quest finished', checkMode($request), 1);
            }
        }
        return redirect()->back()->cookie($cookie);
    }
}