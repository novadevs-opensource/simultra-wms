<?php

namespace Novadevs\Simultra\Base\Models;
    
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transfers';

    /**
     * Every field can be massivelly added unless id
     * 
     */
    protected $guarded = ['id'];

    /**
     * Get the location that owns the transfer.
     */
    public function sourceLocation()
    {
        return $this->belongsTo(Location::class, 'source_location');
    }

    /**
     * destination_location
     *
     * @return void
     */
    public function destinationLocation()
    {
        return $this->belongsTo(Location::class, 'destination_location', 'id');
    }

    /**
     * Get the partner that owns the warehouse.
     */
    public function owner()
    {
        return $this->belongsTo(Partner::class, 'partner', 'id');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product', 'id');
    }

}