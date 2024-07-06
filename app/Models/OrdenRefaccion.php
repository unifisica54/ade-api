<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\NumeroOrden;
use App\Models\Refaccion;
use App\Models\ModelMain;
class OrdenRefaccion extends ModelMain
{
    use HasFactory;
    protected $table = 'orden_refaccion';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'refaccion_id',
        'numero_orden_id',
        'users_id',
        'status',
    ];

    public function numero_orden(): BelongsTo
    {
        return $this->belongsTo(NumeroOrden::class, 'numero_orden_id');
    }

    public function refaccion(): BelongsTo
    {
        return $this->belongsTo(Refaccion::class, 'refaccion_id');
    }
}
