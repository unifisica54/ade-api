<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ModelMain;
use App\Models\TipoDocumento;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Empleados extends ModelMain
{
    use HasFactory;

    protected $table = 'empleados';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'nombres',
        'apel_paterno',
        'apel_materno',
        'tipo_documento_id',
        'numero_documento',
        'telefono',
        'correo',
        'users_id',
        'status',
    ];
    protected $hidden = ['created_at','updated_at','users_id','status'];
  
    public function tipo_documento(): BelongsTo
    {
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id');
    }
}
