<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ModelMain;
use App\Models\Distrito;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Clientes extends ModelMain
{
    use HasFactory;

    protected $table = 'clientes';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'ruc',
        'razon_social',
        'telefono',
        'correo',
        'direccion',
        'ubigeo_id',
        'users_id',
        'status',
    ];
    protected $hidden = ['created_at','updated_at','users_id','status'];
  
    public function distrito(): BelongsTo
    {
        return $this->belongsTo(Distrito::class, 'ubigeo_id','ubigeo');
    }
}
