<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class solicitude extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'solicitudes';

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
    protected $fillable = ['tipo_trabajo', 'diametro_Tubo', 'diametro_Tubo_cur', 'diametro_Tubo_esc', 'diametro_Tubo_ab', 'diametro_Tubo_escdos', 'tipo_material', 'espesor', 'longitud_tubo', 'hay_soldadura', 'numero_soldadura', 'numero_tubos', 'numero_dobleces', 'angulos', 'numero_curvas', 'hay_cortes', 'numero_cortes', 'sentido', 'plantilla', 'ancho', 'altura', 'radio', 'largo', 'hay_pasamanos', 'numero_pasamanos', 'numero_pasamanos_uno', 'diametro_dos', 'largo_total', 'largo_parte_recta', 'a', 'b', 'estado','id_cliente','precio_unitario','precio_total','des_solicitud', 'precio_soldadura', 'precio_cortes', 'costo_doblex', 'costo_curvax', 'hipotenusa', 'a1', 'anguloCurva', 'longitudArco', 'huella', 'contrahuella', 'diaExt', 'diaInt', 'anchoPel', 'hipotenusaDos', 'A1Dos', 'Rcm', 'Hcm', 'zero', 'costo_pasamanos', 'preciodos', 'costo_caracols' , 'factor', 'ipc'];

    /**
     * Define the relationship between Solicitude and Variable.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function variable()
    {
        return $this->hasOne(Variable::class);
    }
}
