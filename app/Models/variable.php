<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class variable extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'variables';

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
    protected $fillable = ['nombre', 'descripcion', 'valor', 'factor0', 'ipc', 'factor'];


}
