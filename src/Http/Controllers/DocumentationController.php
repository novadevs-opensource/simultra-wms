<?php

namespace Novadevs\Simultra\Base\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DocumentationController extends Controller
{
    /**
     * Show documents tree (module's home)
     *
     * @return void
     */
    public function index()
    {
        return view('documentation.index');
    }
}