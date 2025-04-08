<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstudianteModel extends Model
{
    protected $table= 'estudiante';

    protected $primaryKey= 'id_estudiante';

    protected $fillable = [
        'id_estudiante',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'dni',
        'fecha_nacimiento',
        'estado',
        'id_apoderado',
        'id_grado',
        'id_seccion'
        ];

    public $timestamps = false; // Indica que no se gestionarán las marcas de tiempo

    public function apoderado()
    {
        return $this->belongsTo(ApoderadoModel::class, 'id_apoderado');
    }

    public function grado()
    {
        return $this->belongsTo(GradoModel::class, 'id_grado');
    }

    public function seccion()
    {
        return $this->belongsTo(SeccionModel::class, 'id_seccion');
    }

    public function eliminarLogico()
    {
        $this->estado = 0;
        $this->save();
    }
}
