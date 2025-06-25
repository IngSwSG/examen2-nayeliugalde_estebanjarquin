<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unidad extends Model
{
     protected $table = 'unidades';
    protected $primaryKey = 'idUnidad';
    public $timestamps = false;

    protected $fillable = [
        'idUnidad',
        'nombre'
    ];

    public function usuarios(): HasMany
    {
        return $this->hasMany(Material::class, 'idUnidad');
    }

    public function materialesUnidad(): HasMany
    {
        return $this->hasMany(Material::class, 'idUnidad');
    }
}
