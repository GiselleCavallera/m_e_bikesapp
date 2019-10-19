<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RangoDecision extends Model
{
    protected $table = 'rangos_decisiones'; 

    public function scopeIdMedicion($query, $idMedicion)
    {
        return $query->where('idMedicion', $idMedicion);
    }
}
