<?php

namespace App\Http\Controllers;

use App\Models\NumeroOrden;
use App\Models\Parametro;
use Illuminate\Http\Request;
use App\Collections\CasosCollection;
use App\Collections\RefaccionCollection;
use App\Http\Requests\CasosRequest;
use App\Models\Accion;
use App\Models\Equipo;
use App\Models\Clientes;
use App\Models\Refaccion;
use App\Models\Casos;

class CasosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Casos::listar($request->input(),['numero','tarea'], ['accion', 'equipo', 'cliente', 'estado']);
        return response()->json($data);
    }
    public function select(Request $request)
    {
        $estado = Parametro::listar(1);
        return response()->json([
            'estado' => $estado,
        ]);
    }

    public function store(CasosRequest $request)
    {
        $data = Casos::grabar(CasosCollection::filtro($request->validated()));
        return response()->json($data);
    }

    public function edit(Request $request, string $id)
    {
        $result = Casos::editar($request, $id);
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CasosRequest $request, string $id)
    {
        $data = Casos::actualizar(CasosCollection::filtro($request->validated()), $id);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Casos::destruir($id);
        return response()->json($data);
    }

    public function delete(Request $request, string $id)
    {
        $data = Casos::eliminar($request, $id);
        return response()->json($data);
    }
}
