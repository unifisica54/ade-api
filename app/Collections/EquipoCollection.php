<?php

namespace App\Collections;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
class EquipoCollection extends Collection
{
    public static function filtro($request)
    {
        return array_merge([
            'nombre' => $request['nombre'],
            'tipo' => $request['tipo'],
            'marca' => $request['marca'],
            'modelo'=> $request['modelo'],
            'generacion'=> $request['generacion'],
            'numero_serie'=> $request['numero_serie'],
            'users_id'=> auth()->user()->id,
        ]);
    }
}