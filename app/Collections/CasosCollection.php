<?php

namespace App\Collections;

use Illuminate\Support\Collection;
class CasosCollection extends Collection
{
    public static function filtro($request)
    {
        return array_merge([
            'numero' => $request['numero'],
            'tarea' => $request['tarea'],
            'fecha' => $request['fecha'],
            'hora' => $request['hora'],
            'acciones_id' => $request['acciones_id'],
            'equipos_id' => $request['equipos_id'],
            'clientes_id' => $request['clientes_id'],
            'estado_id'=> $request['estado_id'],
            'precio_movilidad_ida' => $request['precio_movilidad_ida'],
            'precio_movilidad_vuelta' => $request['precio_movilidad_vuelta'],
            'users_id'=> auth()->user()->id,
        ]);
    }
}