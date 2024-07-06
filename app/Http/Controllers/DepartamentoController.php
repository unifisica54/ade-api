<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;

class DepartamentoController extends Controller
{
    public function index(Request $request)
    {
        $data = Departamento::listar($request->input(),['nombre'],[]);
        return response()->json($data);
    }
}
