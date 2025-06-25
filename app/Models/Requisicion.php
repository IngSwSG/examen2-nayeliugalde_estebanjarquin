<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Requisicion extends Model
{
    protected $table = 'requisiciones';
    protected $primaryKey = 'idRequisicion';
    public $timestamps = false;

    protected $fillable = [
        'idRequisicion',
        'fecha',
        'estado',
        'idUsuario',
        'idUnidad',
        'idPresupuesto'
    ];


    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }

    public function unidad(): BelongsTo
    {
        return $this->belongsTo(Unidad::class, 'idUnidad');
    }

    public function presupuesto(): BelongsTo
    {
        return $this->belongsTo(Presupuesto::class, 'idPresupuesto');
    }

    public function items(): HasMany
    {
        return $this->hasMany(ItemRequisicion::class, 'idRequisicion');
    }
}
