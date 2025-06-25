<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MaterialUnidad extends Model
{
    protected $table = 'material_unidad';
    public $timestamps = false;

    protected $fillable = [
        'codigo',
        'idUnidad',
        'cantidadDisponible'
    ];


    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class, 'codigo');
    }

    public function unidad(): BelongsTo
    {
        return $this->belongsTo(Unidad::class, 'idUnidad');
    }
}
