<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ModelMain;

class Departamento extends ModelMain
{
    use HasFactory;

    protected $table = 'departamento';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'ubigeo',
        'nombre',
        'status',
    ];
}
