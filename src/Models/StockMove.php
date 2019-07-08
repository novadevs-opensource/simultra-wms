<?php

namespace Novadevs\Simultra\Base\Models;

use Illuminate\Database\Eloquent\Model;

class StockMove extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stock_moves';

    /**
     * Every field can be massivelly added unless id
     * 
     */
    protected $guarded = ['id'];

    /**
     * Get the product that owns the stock move.
     */
    public function prod()
    {
        return $this->belongsTo(Product::class, 'product', 'id');
    }

    /**
     * Get the product that owns the stock move.
     */
    public function sourceLocation()
    {
        return $this->belongsTo(Location::class, 'source_location', 'id');
    }

    /**
     * Get the product that owns the stock move.
     */
    public function destinationLocation()
    {
        return $this->belongsTo(Location::class, 'destination_location', 'id');
    }
}