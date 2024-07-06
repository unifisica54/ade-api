<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModelMain;

class TipoDocumento extends ModelMain
{
    use HasFactory;
    protected $table = 'tipo_documento';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'descripcion',
        'status',
    ];
    protected $hidden = ['status'];
  
}
