<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'titulo',
        'user_id',
    ];

    protected $table = 'grupos';

    public $_timestamps = true;
}

?>