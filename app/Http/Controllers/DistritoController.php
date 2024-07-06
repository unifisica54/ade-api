<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distrito;
use App\Models\Provincia;
use App\Models\Departamento;
class DistritoController extends Controller
{
    public function index(Request $request)
    {
       
        $Distrito = Distrito::listar($request->input()['distrito'],[]);
        $Provincia = Provincia::listar($request->input()['provincia'],[]);
        $Departamento = Departamento::listar($request->input()['departamento'],[]);
        return response()->json([
            'distrito'=>$Distrito,
            'provincia'=>$Provincia,
            'departamento'=>$Departamento,
        ]);
    }
}
