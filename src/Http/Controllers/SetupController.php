<?php

namespace Novadevs\Simultra\Base\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App;
use Log;
use Cookie;
use Illuminate\Http\Request;

use Novadevs\Simultra\Base\Models\BaseCompany;
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
     * @return void
     */
    public function resetDefault()
    {
        $s = new BaseSeeder();

        try {
            $s->run(); 
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Change mode status, can be 1 ("demo") or 2 ("request")
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
                saveReport(__('Quest started'), true);
            }

            if ( $request->route('mode') == 1 ) {
                saveReport(__('Quest finished'));
            }
        }
        return redirect()->back()->cookie($cookie);
    }
}