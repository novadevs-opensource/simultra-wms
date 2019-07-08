<?php

namespace Novadevs\Simultra\Base\Models;
    
use Illuminate\Database\Eloquent\Model;

use \stdClass;

class Module extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'modules';

    /**
     * Every field can be massivelly added unless id
     * 
     */
    protected $guarded = ['id'];
}