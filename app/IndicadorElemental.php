<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndicadorElemental extends Model
{
    protected $table = 'indicadores_elementales';

    public function scopeIdAtributo($query, $idAtributo)
    {
        return $query->where('idAtributo', $idAtributo);
    }

    public function scopeIdMedicion($query, $idMedicion)
    {
        return $query->where('idMedicion', $idMedicion);
    }
}
