<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModelMain;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class GuiaDevolucion extends ModelMain
{
    use HasFactory;
    protected $table = 'guia_devolucion';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'numero',
        'fecha',
        'estado_pieza_id',
        'users_id',
        'status',
    ];

    protected $hidden = ['created_at','updated_at','users_id','status'];
  

    public function estado_pieza(): BelongsTo
    {
        return $this->belongsTo(Parametro::class, 'estado_pieza_id','secuencia')->withDefault(function (Parametro $parametro) {
            $parametro->tipo = 2;
        });
    }

}
