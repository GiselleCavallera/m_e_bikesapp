<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndicadorDerivado extends Model
{
    protected $table = 'indicadores_derivados';

    public function scopeNombreContiene($query, $palabra)
    {
        return $query->where('nombre', 'like', $palabra.'%');
    }

    public function scopeIdMedicion($query, $idMedicion)
    {
        return $query->where('idMedicion', $idMedicion);
    }
}
