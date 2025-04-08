<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatriculaModel extends Model
{
    protected $table= 'matricula';

    protected $primaryKey= 'id_matricula';

    protected $fillable = [
        'id_matricula',
        'id_estudiante',
        'fecha_matricula',
        'estado_matricula',
        'certificado de notas',
        'traslado',
        'otros documentos',
        'fecha_solicitud',
        'observaciones'
        ];

    public $timestamps = false; // Indica que no se gestionarán las marcas de tiempo

    public function estudiante()
    {
        return $this->belongsTo(EstudianteModel::class, 'id_estudiante');
    }
}
