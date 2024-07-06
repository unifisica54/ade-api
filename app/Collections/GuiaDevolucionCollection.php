<?php

namespace App\Collections;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
class GuiaDevolucionCollection extends Collection
{
    public static function filtro($request)
    {
        return array_merge([
            'numero'=> $request['numero'],
            'fecha' => $request['fecha'],
            'estado_pieza_id' => $request['estado_pieza_id'],
            'users_id'=> auth()->user()->id,
        ]);
    }
}