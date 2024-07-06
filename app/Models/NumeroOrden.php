<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ModelMain;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Casos;
use App\Models\GuiaDevolucion;
class NumeroOrden extends ModelMain
{
    use HasFactory;
    protected $table = 'numero_orden';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'numero',
        'cantidad',
        'casos_id',
        'guia_devolucion_id',
        'users_id',
        'status',
    ];

    public function casos(): BelongsTo
    {
        return $this->belongsTo(Casos::class, 'casos_id');
    }

    public function guia_devolucion(): BelongsTo
    {
        return $this->belongsTo(GuiaDevolucion::class, 'guia_devolucion_id');
    }
   
}
