<?php

namespace App\Collections;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
class TipoDocumentoCollection extends Collection
{
    public static function filtro($request)
    {
        return array_merge([
            'descripcion' => $request->nombres,
        ]);
    }
}