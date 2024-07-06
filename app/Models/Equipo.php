<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ModelMain;

class Equipo extends ModelMain
{
    use HasFactory;
    protected $table = 'equipos';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'tipo',
        'marca',
        'modelo',
        'generacion',
        'numero_serie',
        'users_id',
        'status',
    ];

    protected $hidden = ['created_at','updated_at','users_id','status'];
  
}
