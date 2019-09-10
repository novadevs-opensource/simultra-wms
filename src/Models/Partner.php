<?php

namespace Novadevs\Simultra\Base\Models;
    
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'partners';

    /**
     * Every field can be massivelly added unless id
     * 
     */
    protected $guarded = ['id'];

    /**
     * Get movements for a Product.
     */
    public function wh()
    {
        return $this->belongsTo(Warehouse::class,'warehouse', 'id');
    }

    /**
     * Get movements for a Product.
     */
    public function transfer()
    {
        return $this->hasOne(Transfer::class);
    }
}