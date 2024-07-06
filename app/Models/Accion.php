<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ModelMain;
class Accion extends ModelMain
{
    use HasFactory;
    protected $table = 'acciones';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'descripcion',
        'users_id',
        'status',
    ];

    protected $hidden = ['created_at','updated_at','users_id','status'];
}
