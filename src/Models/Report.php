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
     * Used to perstis a new empty set of records
     *
     * @return void
     */
    public static function _new() {
        $u = Auth::user();
        $c = new Report();
        $c->user = $u->id;
        $c->data = json_encode(array());
        $c->save();
    }

    /**
     * If a report exists for the current user, is updated, else, is created. Usually fired by saveReport() helper
     * 
     * @param string $action - Practice´s identificator
     * @param string $points - Score set to this practice
     * @param string $desc - Description of the task
     * @param bool $mode - Quest mode or not
     * @param int $numberOfRecords - Number of times that record can be stored
     * @param object $additional - Eloquent object
     * 
     * @throws Exception 404
     * @return void
     */
    public function _record($action = null, $points = null, $desc = null, $mode = null, $numberOfRecords = null, $additional = null)
    {
        $u = Auth::user();

        try { 
            $c = Self::orderBy('updated_at', 'DESC')->firstOrFail();

        } catch (\Exception $t) { // If any record is retrieved, create a new one
            $c = new Report();
            $c->user = $u->id;
            $c->data = json_encode(array());
        }

        $c->data = $this->_prepareRecord($action, $points, $desc, $c, $additional);

        // Condition to write log (workaround to not repeat scores)
        $cond = $this->_alreadyRecorded( json_decode($c->data), $action, $numberOfRecords);

        // Writing data into a report
        try {
            if ( $cond == false ) {
                $c->save();  
            }

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Prepare data to be persisted
     *
     * @param array|object $action
     * @param object $c
     * 
     * @return string JSON
     */
    public function _prepareRecord($action = null, $points = null, $desc = null, $c, $additional = null)
    {
        $time = $this->_getLastTimeDiff($c->data, $c);

        $dataRecord = json_decode($c->data);
        $r = array(
            'time' => date('Y-m-d H:m:s'),
            'action' => $action,
            'points' => $points,
            'description' => array(
                'desc' => $desc,
                'additional' => $additional
            ),
            'date' => $time,
        );
        array_push($dataRecord , $r);

        return json_encode($dataRecord);
    }

    /**
     * If returns true, it means that some record already exists, if returns false, the record will be saved
     * Fired by _record()
     *
     * @param array $report
     * @param string $action
     * @param integer $numberOfRecords
     * 
     * @return bool
     */
    public function _alreadyRecorded($report, $action, $numberOfRecords) {
        if ($numberOfRecords != null) {

            $counter = 0;
            $maxCounter = $numberOfRecords; // Allowed number of records into the same report
            $cond = false; // Condition to be accomplished

            foreach ($report as $r) { 
                if ($counter == $numberOfRecords) {
                    $cond = true;
                }
                if ( $r->action == $action && $counter != $maxCounter) {
                    $counter++;
                }
            }

            if ($cond) {
                return true; // The max allowed number of records already exists (the record won't be saved)
            } else {
                return false; // The max allowed number of records isn't already exists (the record will be saved)
            }

        } else { // Just for not declared number of records
            foreach ($report as $r) {
                if ( $r->action == $action ) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }


    public function _getLastTimeDiff($json, $report){
        $data = json_decode($json);
        if ( count($data) == 0) {
            $date1 = new \DateTime("now");

        } else {
            $date1 = $report->updated_at;    
        }
        
        $date2 = new \DateTime("now");

        $diff = date_diff( 
           date_create( $date1->format('Y-m-d H:i:s') ), 
           date_create( $date2->format('Y-m-d H:i:s') ) 
        );

        return $diff->h . ':' . $diff->i . ':' . $diff->s;
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