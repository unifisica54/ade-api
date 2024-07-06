<?php

namespace App\Collections;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
class ClienteCollection extends Collection
{
    public static function filtro($request)
    {
        return array_merge([
            'ruc' => $request['ruc'],
            'razon_social' => $request['razon_social'],
            'telefono' => $request['telefono'],
            'correo'=> $request['correo'],
            'direccion'=> $request['direccion'],
            'ubigeo_id'=> $request['ubigeo_id'],
            'users_id'=> auth()->user()->id,
        ]);
    }
}