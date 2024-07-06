<?php

namespace App\Http\Controllers;

use App\Collections\TipoDocumentoCollection;
use App\Http\Requests\TipoDocumentoRequest;
use Illuminate\Http\Request;
use App\Models\TipoDocumento;

class TipoDocumentoController extends Controller
{
  /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = TipoDocumento::listar($request->input(),[],[]);
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipoDocumentoRequest $request)
    {
        $data = TipoDocumento::grabar(TipoDocumentoCollection::filtro($request));
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {
        $result = TipoDocumento::editar($request,$id);
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TipoDocumentoRequest $request, string $id)
    {
        $data = TipoDocumento::actualizar(TipoDocumentoCollection::filtro($request),$id);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=TipoDocumento::destruir($id);
        return response()->json($data);
    }

    public function delete(Request $request, string $id)
    {
        $data=TipoDocumento::eliminar($request,$id);
        return response()->json($data);
    }
}

