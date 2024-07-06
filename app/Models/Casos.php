<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ModelMain;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Accion;
use App\Models\Equipo;
use App\Models\Clientes;
use App\Models\Parametro;

class Casos extends ModelMain
{
    use HasFactory;

    protected $table = 'casos';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'numero',
        'tarea',
        'fecha',
        'hora',
        'acciones_id',
        'equipos_id',
        'clientes_id',
        'estado_id',
        'precio_movilidad_ida',
        'precio_movilidad_vuelta',
        'users_id',
        'status',
    ];
    protected $hidden = ['created_at','updated_at','users_id','status'];
  
    public function accion(): BelongsTo
    {
        return $this->belongsTo(Accion::class, 'acciones_id');
    }
    public function equipo(): BelongsTo
    {
        return $this->belongsTo(Equipo::class, 'equipos_id');
    }
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Clientes::class, 'clientes_id');
    }
    public function estado(): BelongsTo
    {
        return $this->belongsTo(Parametro::class, 'estado_id','secuencia')->withDefault(function (Parametro $parametro) {
            $parametro->tipo = 1;
        });
    }
}
