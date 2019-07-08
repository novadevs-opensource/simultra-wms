<?php

namespace Novadevs\Simultra\Base\Http\Controllers;

use Novadevs\Simultra\Base\Models\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $o = Mail::getInbox();        
        return view('mail.inbox')->with('o', $o);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mail.compose');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $n = new Mail($request->all());
        $n->save();

        $o = Mail::all();
        return redirect(route('messaging.index'));
        // return view('mail.inbox')->with('o', $o);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mail  $products
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $o = Mail::find($id);
        $o->is_read = 1;
        $o->save();

        return view('mail.show')->with('o', $o);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Mail $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mail $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mail $message)
    {
        //
    }

    public function sent()
    {
        $o = Mail::getSent();
        return view('mail.sent')->with('o', $o);
    }
}
