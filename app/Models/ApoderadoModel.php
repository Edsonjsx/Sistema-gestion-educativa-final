<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApoderadoModel extends Model
{
    protected $table= 'apoderado';

    protected $primaryKey= 'id_apoderado';

    protected $fillable = [
        'id_apoderado',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'dni',
        'direccion',
        'telefono',
        'correo'
        ];

        public $timestamps = false; // Indica que no se gestionarán las marcas de tiempo

}
