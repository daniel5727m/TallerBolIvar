<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class perfil_menu extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'perfil_menu';

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
    protected $fillable = ['id_perfil', 'id_menu'];

    
}
