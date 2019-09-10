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
        return $this->hasOne(Partner::class, 'warehouse', 'id');
    }

    /**
     * Get the locations which are part of the warehouse.
     */
    public function locations()
    {
        return $this->hasMany(Location::class, 'warehouse_fk', 'id');
    }


    /**
     * getProductsByWarehouse
     *
     * @return array An array 
     */
    public function getProductsByWarehouse(){
        $locations = $this->locations;
        $products = array();

        /*
        The in_array function cannot compare objects.
        You should create unique key-value pairs from your objects and only need to compare those keys when inserting a new object into your final array.
        Assuming that each object has an unique id property, a possible solution would be:
        */
        foreach ($locations as $i) {
            foreach ($i->products as $p) {
                if (! array_key_exists($p->id, $products) ) {
                    $products[$p->id] = $p;
                    // Replacing the total product QTY by the qty on each location inside the selected W.
                    $products[$p->id]->qty_on_hand = $p->pivot->qty;
                } else {
                    // I need to calculate the total qty for the same product in several location inside the same warehouse
                    $products[$p->id]->qty_on_hand = $products[$p->id]->qty_on_hand + $p->pivot->qty;
                }
            }
        }
        return $products;
    }
}