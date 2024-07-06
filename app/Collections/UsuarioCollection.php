<?php

namespace App\Collections;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
class UsuarioCollection extends Collection
{
    public static function filtro($request)
    {
        return array_merge([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'users_id'=> auth()->user()->id,
        ]);
    }
}