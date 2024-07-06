<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Provincia;
use App\Models\Departamento;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\ModelMain;
class Distrito extends ModelMain
{
    use HasFactory;

    protected $table = 'distrito';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'ubigeo',
        'nombre',
        'provincia_id',
        'departamento_id',
        'status',
    ];

    public function provincia(): BelongsTo
    {
        return $this->belongsTo(Provincia::class, 'provincia_id','ubigeo');
    }

    public function departamento(): BelongsTo
    {
        return $this->belongsTo(Departamento::class, 'departamento_id','ubigeo');
    }
}
