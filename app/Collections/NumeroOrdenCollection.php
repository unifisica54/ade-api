<?php

namespace App\Collections;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
class NumeroOrdenCollection extends Collection
{
    public static function filtro($request)
    {
        return array_merge([
            'numero' => $request['numero'],
            'casos_id' => $request['casos_id'],
            'guia_devolucion_id' => $request['guia_devolucion_id'],
            'users_id'=> auth()->user()->id,
        ]);
    }
}