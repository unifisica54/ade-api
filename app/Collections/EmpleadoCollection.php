<?php

namespace App\Collections;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
class EmpleadoCollection extends Collection
{
    public static function filtro($request)
    {
        return array_merge([
            'nombres' => $request['nombres'],
            'apel_paterno' => $request['apel_paterno'],
            'apel_materno' => $request['apel_materno'],
            'tipo_documento_id'=> $request['tipo_documento_id'],
            'numero_documento'=> $request['numero_documento'],
            'telefono'=> $request['telefono'],
            'correo'=> $request['correo'],
            'users_id'=> auth()->user()->id,
        ]);
    }
}