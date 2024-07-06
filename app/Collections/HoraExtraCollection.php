<?php

namespace App\Collections;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
class HoraExtraCollection extends Collection
{
    public static function filtro($request)
    {
        return array_merge([
            'inicio' => $request['inicio'],
            'final' => $request['final'],
            'casos_id' => $request['casos_id'],
            'users_id'=> auth()->user()->id,
        ]);
    }
}