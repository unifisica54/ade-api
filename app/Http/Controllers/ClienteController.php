<?php

namespace App\Http\Controllers;

use App\Collections\ClienteCollection;
use App\Http\Requests\ClienteRequest;
use App\Models\Clientes;
use Illuminate\Http\Request;
use App\Models\Distrito;
use App\Models\Provincia;
use App\Models\Departamento;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function select (Request $request){
      
        $Distrito = Distrito::listar($request->input()['provincia'],['provincia_id'],[]);
        $Provincia = Provincia::listar($request->input()['departamento'],['departamento_id'],[]);
        $Departamento = Departamento::listar($request->input()['departamento'],[],[]);
        return response()->json([
            'distrito'=>$Distrito,
            'provincia'=>$Provincia,
            'departamento'=>$Departamento,
        ]);
    }
     public function index(Request $request)
    {
        $data = Clientes::listar($request->input(),['razon_social','telefono','correo','direccion'],[]);
        return response()->json($data);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ClienteRequest $request)
    {
        $data = Clientes::grabar(ClienteCollection::filtro($request->validated()));
        
        return response()->json($data);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {
        $result = Clientes::editar($request,$id,['distrito']);
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClienteRequest $request, string $id)
    {
        $data = Clientes::actualizar(ClienteCollection::filtro($request->validated()),$id);
        return response()->json($data);
    }

    public function delete(Request $request, string $id)
    {
        $data=Clientes::eliminar($request,$id);
        return response()->json($data);
    }
}
