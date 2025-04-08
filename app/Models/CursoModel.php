<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CursoModel extends Model
{
    protected $table= 'cursos';

    protected $primaryKey= 'id_curso';

    protected $fillable = [
        'id_curso',
        'nombre'
        ];

    public $timestamps = false;

    public function docente()
{
    return $this->belongsTo(DocenteModel::class, 'id_docente');
}
}
