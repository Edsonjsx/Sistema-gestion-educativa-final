<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradoModel extends Model
{
    protected $table= 'grado';

    protected $primaryKey= 'id_grado';

    protected $fillable = [
        'id_grado',
        'nombre'
        ];

    public $timestamps = false; // Indica que no se gestionarán las marcas de tiempo

}
