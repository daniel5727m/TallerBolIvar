<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class log extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'logs';

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
    protected $fillable = ['peticion_api', 'metodo_peticion', 'fecha', 'peticion', 'peticion', 'respuesta', 'exito'];

    
}
