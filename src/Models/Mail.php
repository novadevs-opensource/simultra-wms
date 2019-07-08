<?php

namespace Novadevs\Simultra\Base\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class Mail extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mails';

    /**
     * Every field can be massivelly added unless id
     * 
     */
    protected $guarded = ['id'];

    /**
     * Undocumented function
     *
     * @return array
     */
    public static function getInbox()
    {
        return DB::table('mails')->where([
            ['to', 'NOT LIKE', '%@customer.com'],
            ['to', 'NOT LIKE', '%@supplier.com'],
            ['to', 'NOT LIKE', '%@simultra.com']
        ])->get();       
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    public static function getSent()
    {
        return DB::table('mails')->where('from', '=', Auth::user()->email)->get();
    }
}