<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocenteModel extends Model
{
    protected $table= 'docente';

    protected $primaryKey= 'id_docente';

    protected $fillable = [
        'id_docente',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'dni',
        'id_curso',
        'estado'
        ];

    public $timestamps = false;


    public function curso()
    {
        return $this->belongsTo(CursoModel::class, 'id_curso');
    }

    public function eliminarLogico()
    {
        $this->estado = 0;
        $this->save();
    }
}
