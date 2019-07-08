<?php

namespace Novadevs\Simultra\Base\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;

class Report extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reports';

    /**
     * Massively editable field
     *
     * @var array
     */
    protected $fillable = ['data'];

    /**
     * If a report exists for the current user, is updated, else, is created. Usually fired bu saveReport() helper
     * 
     * @param string|array $action
     * @param boolean $mode
     * 
     * @throws Exception 404
     * @return void
     */
    public function _record($action, $mode = null)
    {
        $u = Auth::user();

        try { 
            if ( $mode ) { 
                //If the exam mode has been trigered, create a new record
                $c = new Report();
                $c->user = $u->id;
                $c->data = json_encode(array());

            } else { 
                // Get the last user record
                $c = Self::orderBy('updated_at', 'DESC')->firstOrFail();
            }

        } catch (\Exception $t) { // If any record is retrieved, create a new one
            $c = new Report();
            $c->user = $u->id;
            $c->data = json_encode(array());
        }

        try {
            $c->data = $this->_prepareRecord($action, $c);
            $c->save();  

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Prepare data to be persisted
     *
     * @param array|object $action
     * @param object $c
     * @return string JSON
     */
    public function _prepareRecord($action = null, $c)
    {
        $dataRecord = json_decode($c->data);
        $r = array(
            'time' => date('Y-m-d H:m:s'),
            'action' => $action,
        );
        array_push($dataRecord , $r);

        return json_encode($dataRecord);
    }

    /**
     * One to One relation
     *
     * @return object
     */
    public function u()
    {
        return $this->belongsTo('App\User', 'user', 'id');
    }
}