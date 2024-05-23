<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class solicitud extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
   /*  protected $table = 'solicitudes'; */

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

    protected $fillable = ['nro_solicitud ','cod_tipo_solicitud', 'des_solicitud', 'cod_estado_solicitud','cod_inmueble','motivo_solicitud','tipo_solicitante','user_id','fecha_agendamiento'];


}
