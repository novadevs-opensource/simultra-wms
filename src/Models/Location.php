<?php

namespace Novadevs\Simultra\Base\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'locations';

    /**
     * Every field can be massivelly added unless id
     * 
     */
    protected $guarded = ['id'];

    /**
     * Get movements for a Location.
     * 
     * @return array
     */
    public function mvs()
    {
        return $this->hasMany(StockMove::class, 'id');
    }

    /**
     * Get transfers for a Location.
     * 
     * @return array
     */
    public function transfers()
    {
        return $this->hasMany(Transfer::class, 'id');
    }

    /**
     * Get the parent location
     *
     * @return object
     */
    public function parentLocation()
    {
        return $this->find($this->parent_location);
    }

    /**
     * Get al products qtys for each location
     * Adds every pivot table field prefixed as pivot_{field} accessed with $object->pivot->field
     *
     * @return array
     */
    public function products(){ 
        return $this->belongsToMany(Product::class,'product_location')
        ->withPivot('product_id','qty')
        ->withTimestamps(); 
    }
}