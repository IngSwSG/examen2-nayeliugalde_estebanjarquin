<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'idCategoria';
    public $timestamps = false;

    protected $fillable = [
        'idCategoria',
        'nombre'
    ];

    public function materiales(): HasMany
    {
        return $this->hasMany(Material::class, 'idCategoria');
    }
}

