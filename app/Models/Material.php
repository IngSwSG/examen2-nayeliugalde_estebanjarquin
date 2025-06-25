<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Material extends Model
{
    protected $table = 'materiales';
    protected $primaryKey = 'codigo';
    public $timestamps = false;

    protected $fillable = [
        'codigo',
        'unidadMedida',
        'descripcion',
        'ubicacion',
        'idCategoria'
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'idCategoria');
    }

    public function materialesUnidades(): HasMany
    {
        return $this->hasMany(MaterialUnidad::class, 'codigo');
    }

    public function itemsRequisicion(): BelongsTo
    {
        return $this->belongsTo(Unidad::class, 'codigo');
    }
}
