<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departamento;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\ModelMain;
class Provincia extends ModelMain
{
    use HasFactory;
    protected $table = 'provincia';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'ubigeo',
        'nombre',
        'departamento_id',
        'status',
    ];

    public function departamento(): BelongsTo
    {
        return $this->belongsTo(Departamento::class, 'departamento_id','ubigeo');
    }
}
