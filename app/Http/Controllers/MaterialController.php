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
}

