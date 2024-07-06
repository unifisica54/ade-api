<?php

namespace App\Http\Controllers;

use App\Collections\GuiaDevolucionCollection;
use App\Http\Requests\GuiaDevolucionRequest;
use Illuminate\Http\Request;
use App\Models\GuiaDevolucion;
use App\Models\NumeroOrden;
use App\Models\Parametro;
class GuiaDevolucionController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = GuiaDevolucion::listar($request->input(),['numero'],['estado_pieza']);
        return response()->json($data);
    }
    public function select(Request $request)
    {
        $estado = Parametro::listar(2);
        return response()->json([
            'estado'=>$estado,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(GuiaDevolucionRequest $request)
    {
        $data = GuiaDevolucion::grabar(GuiaDevolucionCollection::filtro($request->validated()));
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {
        $result = GuiaDevolucion::editar($request,$id);
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GuiaDevolucionRequest $request, string $id)
    {
        $data = GuiaDevolucion::actualizar(GuiaDevolucionCollection::filtro($request->validated()),$id);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=GuiaDevolucion::destruir($id);
        return response()->json($data);
    }

    public function delete(Request $request, string $id)
    {
        $data=GuiaDevolucion::eliminar($request,$id);
        return response()->json($data);
    }
}
