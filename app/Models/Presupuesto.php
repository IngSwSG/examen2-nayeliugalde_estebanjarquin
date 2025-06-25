<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Presupuesto extends Model
{
    protected $table = 'presupuestos';
    protected $primaryKey = 'idPresupuesto';
    public $timestamps = false;

    protected $fillable = [
        'idPresupuesto',
        'anio',
        'montoDisponible',
        'idUnidad'
    ];

    public function unidad(): BelongsTo
    {
        return $this->belongsTo(Unidad::class, 'idUnidad');
    }
}
