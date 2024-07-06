<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincia;

class ProvinciaController extends Controller
{
    public function index(Request $request)
    {
        $data = Provincia::listar($request->input(),[]);
        return response()->json($data);
    }
}
