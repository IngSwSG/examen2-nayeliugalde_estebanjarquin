<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class MaterialController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|integer|unique:materiales,codigo',
            'unidadMedida' => 'required|string|max:50',
            'descripcion' => 'required|string',
            'ubicacion' => 'required|string|max:100',
            'idCategoria' => 'required|exists:categorias,idCategoria'
        ]);

        $material = Material::create([
            'codigo' => $request->codigo,
            'unidadMedida' => $request->unidadMedida,
            'descripcion' => $request->descripcion,
            'ubicacion' => $request->ubicacion,
            'idCategoria' => $request->idCategoria
        ]);

        return response()->json([
            'mensaje' => 'Material registrado correctamente',
            'material' => $material
        ], 201);
    }

    public function update(Request $request, $codigo)
{
  
    $material = Material::find($codigo);

    if (!$material) {
        return response()->json(['message' => 'Material no encontrado'], 404);
    }

  
    $request->validate([
        'unidadMedida' => 'sometimes|required|string|max:50',
        'descripcion' => 'sometimes|required|string',
        'ubicacion' => 'sometimes|required|string|max:100',
        'idCategoria' => 'sometimes|required|exists:categorias,idCategoria'
    ]);


    $material->update($request->only([
        'unidadMedida',
        'descripcion',
        'ubicacion',
        'idCategoria'
    ]));

    return response()->json([
        'message' => 'Material actualizado correctamente',
        'material' => $material
    ]);
}
public function index()
{
    $materiales = Material::with('categoria')->get();

    return response()->json([
        'materiales' => $materiales
    ]);
}

}

