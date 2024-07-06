<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parametro extends Model
{

    const STATUS_ENABLED = 1;
    use HasFactory;

    protected $table = 'parametro';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'secuencia',
        'tipo',
        'descripcion',
        'users_id',
        'status',
    ];
    protected $hidden = ['created_at','updated_at','users_id','status'];
    public static function listar($tipo){
        $data = self::select('secuencia as id','descripcion')
        ->where('tipo', $tipo)
        ->where('status',self::STATUS_ENABLED)
        ->orderBy('secuencia', 'asc')->paginate();
        if (!$data) return ['data'=>false,'message'=>'no exite registro'];
        return ['data'=>$data,'message' => 'Listado con exito!'];
    }
}
