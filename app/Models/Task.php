<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'tarea_id',
        'titulo',
        'usuario_id',
        'fecha_limite',
        'estatus',
        'grupo_id',
    ];

    protected $table = 'tareas';
    
    public $_timestamps = true;

    protected $primaryKey = 'tarea_id';

}

?>