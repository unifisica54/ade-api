<?php

namespace App\Collections;

use Illuminate\Support\Collection;
class OrdenRefaccionCollection extends Collection
{
    public static function filtro($request)
    {
       
        return array_merge([
            'refaccion_id'=> $request['refaccion_id'],
            'numero_orden_id'=> $request['numero_orden_id'],
            'users_id'=> auth()->user()->id,
        ]);
    }
}