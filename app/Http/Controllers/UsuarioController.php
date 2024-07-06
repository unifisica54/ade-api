<?php

namespace App\Http\Controllers;

use App\Collections\UsuarioCollection;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
  /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Usuario::listar($request->input(),['name','email'],[]);
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuarioRequest $request)
    {
        $data = Usuario::grabar(UsuarioCollection::filtro($request->validated()));
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {
        $result = Usuario::editar($request,$id);
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsuarioRequest $request, string $id)
    {
        $data = Usuario::actualizar(UsuarioCollection::filtro($request->validated()),$id);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=Usuario::destruir($id);
        return response()->json($data);
    }

    public function delete(Request $request, string $id)
    {
        $data=Usuario::eliminar($request,$id);
        return response()->json($data);
    }
}
