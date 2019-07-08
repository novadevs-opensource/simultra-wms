<?php

namespace Novadevs\Simultra\Base\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class WhTool extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wh_tools';

    /**
     * Every field can be massivelly added unless id
     * 
     */
    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}