<?php

namespace Novadevs\Simultra\Base\Models;
    
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * Every field can be massivelly added unless id
     * 
     */
    protected $guarded = ['id'];

    /**
     * Get movements for a Product.
     */
    public function mvs()
    {
        return $this->hasMany(StockMove::class, 'product');
    }

    /**
     * Get al products qtys for each location
     * Adds every pivot table field prefixed as pivot_{field} accessed with $object->pivot->field
     *
     * @return array
     */
    public function locations(){ 
        return $this->belongsToMany(Location::class,'product_location')
        ->withPivot('location_id','qty')
        ->withTimestamps(); 
    }
}