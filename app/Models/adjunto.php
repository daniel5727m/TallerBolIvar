<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class adjunto extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'adjuntos';

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
    protected $fillable = ['id_solicitudes', 'nro_solicitud', 'cod_inmueble', 'nombre_archivo', 'ruta_archivo', 'orden', 'user_id'];

    
}
