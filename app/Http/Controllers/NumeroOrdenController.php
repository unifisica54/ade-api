<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collections\NumeroOrdenCollection;
use App\Http\Requests\NumeroOrdenRequest;
use App\Models\NumeroOrden;
use App\Models\Refaccion;
use App\Models\GuiaDevolucion;
use App\Models\Casos;
class NumeroOrdenController extends Controller
{
    public function index(Request $request)
    {
        $data = NumeroOrden::listar($request->input(),['numero'],[]);
        return response()->json($data);
    }
    public function select(Request $request)
    {
        $numero_orden = NumeroOrden::listar($request->input()['numero_orden'],[], []);
        $refaccion = Refaccion::listar($request->input()['refaccion'],[], []);
        $guia_devolucion = GuiaDevolucion::listar($request->input()['guia_devolucion'],[], []);
        $casos = Casos::listar($request->input()['casos'],[], []);
        return response()->json([
            'numero_orden' => $numero_orden,
            'refaccion' => $refaccion,
            'guia_devolucion' => $guia_devolucion,
            'casos' => $casos,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(NumeroOrdenRequest $request)
    {
        $data = NumeroOrden::grabar(NumeroOrdenCollection::filtro($request->validated()));
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {
        $result = NumeroOrden::editar($request,$id);
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NumeroOrdenRequest $request, string $id)
    {
        $data = NumeroOrden::actualizar(NumeroOrdenCollection::filtro($request->validated()),$id);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=NumeroOrden::destruir($id);
        return response()->json($data);
    }

    public function delete(Request $request, string $id)
    {
        $data=NumeroOrden::eliminar($request,$id);
        return response()->json($data);
    }
}
