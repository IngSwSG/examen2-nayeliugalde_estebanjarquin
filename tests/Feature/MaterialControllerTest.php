<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Categoria;

class MaterialControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function dadoUnMaterialQueNoExiste_insertarMaterial_funcionaCorrectamente()

    {
        // Crear categoría asociada
        $categoria = Categoria::create([
            'idCategoria' => 1,
            'nombre' => 'Suministros'
        ]);

        // Datos del nuevo material (no existe aún)
        $datos = [
            'codigo' => 200,
            'unidadMedida' => 'Cajas',
            'descripcion' => 'Cajas de clips grandes',
            'ubicacion' => 'Estante B2',
            'idCategoria' => $categoria->idCategoria
        ];

        // Llamar al endpoint
        $response = $this->post('/materiales', $datos);

        // Validar respuesta HTTP
        $response->assertStatus(201);
        $response->assertJson([
            'mensaje' => 'Material registrado correctamente',
            'material' => [
                'codigo' => 200,
                'unidadMedida' => 'Cajas',
                'descripcion' => 'Cajas de clips grandes',
                'ubicacion' => 'Estante B2',
                'idCategoria' => 1
            ]
        ]);

        // Validar que se insertó en la base de datos
        $this->assertDatabaseHas('materiales', [
            'codigo' => 200,
            'unidadMedida' => 'Cajas',
            'descripcion' => 'Cajas de clips grandes',
            'ubicacion' => 'Estante B2',
            'idCategoria' => 1
        ]);
    }
}

