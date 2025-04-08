<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeccionModel extends Model
{
    protected $table= 'seccion';

    protected $primaryKey= 'id_seccion';

    protected $fillable = [
        'id_seccion',
        'seccion'
        ];

    public $timestamps = false; // Indica que no se gestionarán las marcas de tiempo
}
