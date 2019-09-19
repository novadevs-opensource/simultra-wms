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
    public function create(Request $request)
    {
        switch ($request->get('action')) {
            case 'new':
                return view('mail.compose')->with('o', null)
                                            ->with('a', $request->get('action'));
                break;

            case 'reply':
                $o = Mail::find($request->get('mail'));
                return view('mail.compose')->with('o', $o)
                                            ->with('a', 'Re:');
                break;

            case 'forward':
                $o = Mail::find($request->get('mail'));
                return view('mail.compose')->with('o', $o)
                                            ->with('a', 'Fwd:');
                break;

            default:
                break;
        }
        $o = Mail::find($request->get('mail'));
        return view('mail.compose')->with('o', $o);
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

         // Practice reporting
         switch ($n->subject) {
            case 'Re: [P.1] New products':
                $o = (object) $n->toArray();
                saveReport('[P.1.4]', '2', 'Responding to the email', checkMode($request), 1, $o);
                break;

            case 'Re: [P.3] New warehouse':
                $o = (object) $n->toArray();
                saveReport('[P.3.5]', '2', 'Responding to the email', checkMode($request), 1, $o);
                break;

            case 'Re: [P.4] New stock move':
                $o = (object) $n->toArray();
                saveReport('[P.4.6]', '2', 'Responding to the email', checkMode($request), 1, $o);
                break;
            
            case 'Re: [P.5] Stock break!':
                $o = (object) $n->toArray();
                saveReport('[P.5.6]', '2', 'Responding to the email', checkMode($request), 1, $o);
                break;

            case 'Re: [P.6] New order':
                $o = (object) $n->toArray();
                saveReport('[P.6.6]', '2', 'Responding to the email', checkMode($request), 1, $o);
                break;
            
            default:
                break;
        }

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
    public function show(Request $request, $id)
    {   
        $o = Mail::find($id);
        $o->is_read = 1;
        $o->save();

        // Practice reporting
        switch ($o->subject) {
            case '[P.1] New products':
                saveReport('[P.1.1]', '1', 'Accessing to the email', checkMode($request), 1);
                break;

            case '[P.2] New receipt':
                saveReport('[P.2.1]', '1', 'Accessing to the email', checkMode($request), 1);
                break;

            case '[P.4] New stock move':
                saveReport('[P.4.1]', '1', 'Accessing to the email', checkMode($request), 1);
                break;

            case '[P.5] Stock break!':
                saveReport('[P.5.1]', '2', 'Accessing to the email', checkMode($request), 1);
                break;

            case '[P.6] New order':
                saveReport('[P.5.1]', '2', 'Accessing to the email', checkMode($request), 1);
                break;

            default:
                # code...
                break;
        }

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