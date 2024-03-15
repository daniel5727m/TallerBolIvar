<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class costo_curva extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'costo_curvas';

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
    protected $fillable = ['tipo', 'diametro_Tubo', 'radio_Curvatura', 'precio'];

    
}
