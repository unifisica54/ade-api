<?php

namespace App\Http\Controllers;

use App\Collections\RefaccionCollection;
use App\Http\Requests\RefaccionRequest;
use App\Models\NumeroOrden;
use Illuminate\Http\Request;
use App\Models\Refaccion;

class RefaccionController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Refaccion::listar($request->input(),['numero_parte','descripcion'],[]);
        return response()->json($data);
    }
    public function select(Request $request)
    {
        
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(RefaccionRequest $request)
    {
        $data = Refaccion::grabar(RefaccionCollection::filtro($request->validated()));
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {
        $result = Refaccion::editar($request,$id);
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RefaccionRequest $request, string $id)
    {
        $data = Refaccion::actualizar(RefaccionCollection::filtro($request->validated()),$id);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=Refaccion::destruir($id);
        return response()->json($data);
    }

    public function delete(Request $request, string $id)
    {
        $data=Refaccion::eliminar($request,$id);
        return response()->json($data);
    }
}
