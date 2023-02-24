<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agentes extends Model
{
    use HasFactory, SoftDeletes;

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
        'empresa_id'
    ];

    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresas::class, 'empresa_id','id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'empresa_id' => 'integer',
    ];
}
