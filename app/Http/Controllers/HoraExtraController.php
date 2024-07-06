<?php

namespace App\Http\Controllers;

use App\Collections\HoraExtraCollection;
use App\Http\Requests\HoraExtraRequest;
use App\Models\Casos;
use App\Models\HoraExtra;
use Illuminate\Http\Request;

class HoraExtraController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = HoraExtra::where('status', 1)
        ->with([
            'casos' => function ($query) {
                $query->where('status', 1);
            }
        ]);

    // Search functionality
    if ($search = $request->input('search')) {
        $query->where(function ($query) use ($search) {
            $query->WhereHas('casos', function ($q) use ($search) {
                $q->where('numero', 'like', "%{$search}%");
            });
        });
    }

    // Pagination
    $data = $query->orderBy('id', 'desc')->paginate($request->input('size', 15)); // Default to 15 if 'size' is not specified

    // Transform the data
    $data->getCollection()->transform(function ($horaExtra) {
        return [
            'id' => $horaExtra->id,
            'inicio' => $horaExtra->inicio,
            'final' => $horaExtra->final,
            'numero' => optional($horaExtra->casos)->numero ?? '',
        ];
    });

    // Return response
    if ($data->isEmpty()) {
        return response()->json(['data' => false, 'message' => 'No existe registro']);
    }
    return response()->json(['data' => $data, 'message' => 'Listado con éxito!']);


        /*$data = HoraExtra::listar($request->input(),[],['casos']);
        return response()->json($data);*/
    }

    public function select(Request $request)
    {
       
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(HoraExtraRequest $request)
    {
        $data = HoraExtra::grabar(HoraExtraCollection::filtro($request->validated()));
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {
        $result = HoraExtra::editar($request,$id);
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HoraExtraRequest $request, string $id)
    {
        $data = HoraExtra::actualizar(HoraExtraCollection::filtro($request->validated()),$id);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=HoraExtra::destruir($id);
        return response()->json($data);
    }

    public function delete(Request $request, string $id)
    {
        $data=HoraExtra::eliminar($request,$id);
        return response()->json($data);
    }
}
