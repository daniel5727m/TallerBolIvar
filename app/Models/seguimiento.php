<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class seguimiento extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'seguimientos';

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
    protected $fillable = ['id_solicitudes', 'nro_solicitud', 'estado', 'novedad', 'comentario', 'user_id'];

    
}
