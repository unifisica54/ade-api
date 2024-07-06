<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ModelMain;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\NumeroOrden;

class Refaccion extends ModelMain
{
    use HasFactory;
    protected $table = 'refaccion';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'numero_parte',
        'descripcion',
        'cantidad',
        'users_id',
        'status',
    ];

    protected $hidden = ['created_at','updated_at','users_id','status'];
   

}
