<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ModelMain;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Casos;
class HoraExtra extends ModelMain
{
    use HasFactory;
    protected $table = 'hora_extras';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'inicio',
        'final',
        'casos_id',
        'users_id',
        'status',
    ];

    protected $hidden = ['created_at','updated_at','users_id','status'];
    
    public function casos(): BelongsTo
    {
        return $this->belongsTo(Casos::class, 'casos_id');
    }
}
