<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Agentes extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'cod_socio',
        'telefono',
        'foto',
    ];

    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresas::class, 'empresa_id','id');
    }
}
