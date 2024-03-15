<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class costo_caracol extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'costo_caracols';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['diametro_Tubo', 'precio'];

    
}
