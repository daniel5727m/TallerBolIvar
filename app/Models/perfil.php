<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class perfil extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'perfil';

    /**
    * The database primary key value.
    *
    * @var string
    */


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_perfil', 'descripcion_perfil'];

    
}
