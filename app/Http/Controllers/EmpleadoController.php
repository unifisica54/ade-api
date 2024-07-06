<?php

namespace App\Http\Controllers;

use App\Collections\EmpleadoCollection;
use App\Http\Requests\EmpleadoRequest;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;
use App\Models\Empleados;

class EmpleadoController extends Controller
{
    
    public function select (Request $request){
      
        $TipoDocumento = TipoDocumento::listar($request->input()['tipo_documento'],[],[]);
        return response()->json([
            'tipo_documento'=>$TipoDocumento,
        ]);
    }

    public function index(Request $request)
    {
        $data = Empleados::listar($request->input(),[],['tipo_documento']);
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmpleadoRequest $request)
    {
        $data = Empleados::grabar(EmpleadoCollection::filtro($request->validated()));
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {
        $result = Empleados::editar($request,$id);
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmpleadoRequest $request, string $id)
    {
        $data = Empleados::actualizar(EmpleadoCollection::filtro($request->validated()),$id);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=Empleados::destruir($id);
        return response()->json($data);
    }

    public function delete(Request $request, string $id)
    {
        $data=Empleados::eliminar($request,$id);
        return response()->json($data);
    }
}
