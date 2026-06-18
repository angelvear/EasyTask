<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shared extends Model
{
    protected $fillable = [
        'id',
        'id_user',
        'id_grupo',
    ];

    protected $table = 'shared_groups';

    public $_timestamps = true;
}

?>