<?php

namespace Novadevs\Simultra\Base\Models;
    
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'warehouses';

    /**
     * Every field can be massivelly added unless id
     * 
     */
    protected $guarded = ['id'];


    /**
     * Get the partner that owns the warehouse.
     */
    public function partner()
    {
        return $this->belongsTo(Partner::class, 'warehouse');
    }
}