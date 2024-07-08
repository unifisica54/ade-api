<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collections\OrdenRefaccionCollection;
use App\Http\Requests\OrdenRefaccionRequest;
use App\Models\OrdenRefaccion;
class OrdenRefaccionController extends Controller
{
    public function index(Request $request)
    {

        $query = OrdenRefaccion::where('status', 1)
            ->with([
                'refaccion' => function ($query) {
                    $query->where('status', 1);
                },
                'numero_orden' => function ($query) {
                    $query->where('status', 1)->with([
                        'guia_devolucion' => function ($query) {
                            $query->where('status', 1);
                        },
                        'casos' => function ($query) {
                            $query->where('status', 1);
                        }
                    ]);
                }
            ]);
    
        // Search functionality
        if ($search = $request->input('search')) {
            $query->where(function ($query) use ($search) {
                $query->whereHas('numero_orden', function ($q) use ($search) {
                    $q->where('numero', 'like', "%{$search}%")
                      ->orWhereHas('guia_devolucion', function ($q) use ($search) {
                          $q->where('numero', 'like', "%{$search}%");
                      })
                      ->orWhereHas('casos', function ($q) use ($search) {
                          $q->where('numero', 'like', "%{$search}%");
                      });
                })
                ->orWhereHas('refaccion', function ($q) use ($search) {
                    $q->where('numero_parte', 'like', "%{$search}%");
                });
            });
        }
    
        // Pagination
        $data = $query->orderBy('id', 'desc')->paginate($request->input('size', 15));

        // Transform the data
        $data->getCollection()->transform(function ($ordenRefaccion) {
            return [
                'id' => $ordenRefaccion->id,
                'numero_orden' => optional($ordenRefaccion->numero_orden)->numero ?? '',
                'cantidad' => optional($ordenRefaccion->numero_orden)->cantidad ?? '',
                'numero_guia' => optional(optional($ordenRefaccion->numero_orden)->guia_devolucion)->numero ?? '',
                'numero_parte' => optional($ordenRefaccion->refaccion)->numero_parte ?? '',
                'numero_casos' => optional(optional($ordenRefaccion->numero_orden)->casos)->numero ?? '',
            ];
        });
    
        // Return response
        /*if ($data->isEmpty()) {
            return response()->json(['data' => false, 'message' => 'No existe registro']);
        }*/
        return response()->json(['data' => $data, 'message' => 'Listado con éxito!']);
    }
    public function select(Request $request)
    {
        /*$numero_orden = NumeroOrden::listar($request->input()['numero_orden'], []);
        $refaccion = Refaccion::listar($request->input()['refaccion'], []);
        $guia_devolucion = GuiaDevolucion::listar($request->input()['guia_devolucion'], []);
        $casos = Casos::listar($request->input()['casos'], []);
        return response()->json([
            'numero_orden' => $numero_orden,
            'refaccion' => $refaccion,
            'guia_devolucion' => $guia_devolucion,
            'casos' => $casos,
        ]);*/
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(OrdenRefaccionRequest $request)
    {
        $data = OrdenRefaccion::grabar(OrdenRefaccionCollection::filtro($request->validated()));
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $result = OrdenRefaccion::editar($request, $id, );
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrdenRefaccionRequest $request, string $id)
    {
        $data = OrdenRefaccion::actualizar(OrdenRefaccionCollection::filtro($request->validated()), $id);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = OrdenRefaccion::destruir($id);
        return response()->json($data);
    }

    public function delete(Request $request, string $id)
    {
        $data = OrdenRefaccion::eliminar($request, $id);
        return response()->json($data);
    }
}
