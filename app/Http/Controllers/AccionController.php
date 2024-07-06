<?php

namespace App\Http\Controllers;

use App\Collections\AccionCollection;
use App\Http\Requests\AccionRequest;
use App\Models\Accion;
use Illuminate\Http\Request;

class AccionController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Accion::listar($request->input(),['descripcion'],[]);
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccionRequest $request)
    {
        $data = Accion::grabar(AccionCollection::filtro($request->validated()));
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {
        $result = Accion::editar($request,$id);
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AccionRequest $request, string $id)
    {
        $data = Accion::actualizar(AccionCollection::filtro($request->validated()),$id);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=Accion::destruir($id);
        return response()->json($data);
    }

    public function delete(Request $request, string $id)
    {
        $data=Accion::eliminar($request,$id);
        return response()->json($data);
    }
}
