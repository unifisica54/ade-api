<?php

namespace App\Http\Controllers;

use App\Collections\EquipoCollection;
use App\Http\Requests\EquipoRequest;
use Illuminate\Http\Request;
use App\Models\Equipo;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Equipo::listar($request->input(),['nombre','marca','modelo'],[]);
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EquipoRequest $request)
    {
        $data = Equipo::grabar(EquipoCollection::filtro($request->validated()));
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {
        $result = Equipo::editar($request,$id);
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EquipoRequest $request, string $id)
    {
        $data = Equipo::actualizar(EquipoCollection::filtro($request->validated()),$id);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=Equipo::destruir($id);
        return response()->json($data);
    }

    public function delete(Request $request, string $id)
    {
        $data=Equipo::eliminar($request,$id);
        return response()->json($data);
    }
}
