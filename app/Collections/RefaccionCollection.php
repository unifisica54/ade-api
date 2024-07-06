<?php

namespace App\Collections;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
class RefaccionCollection extends Collection
{
    public static function filtro($request)
    {
        return array_merge([
            'numero_parte' => $request['numero_parte'],
            'descripcion' => $request['descripcion'],
            'users_id'=> auth()->user()->id,
        ]);
    }
}