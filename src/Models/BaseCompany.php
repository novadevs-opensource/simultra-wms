<?php

namespace Novadevs\Simultra\Base\Models;

use Illuminate\Database\Eloquent\Model;

class BaseCompany extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'base_company';

    /**
     * Every field can be massivelly added unless id
     * 
     */
    protected $guarded = ['id'];
}