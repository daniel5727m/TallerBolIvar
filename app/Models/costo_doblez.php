<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class costo_doblez extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'costo_doblezs';

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
