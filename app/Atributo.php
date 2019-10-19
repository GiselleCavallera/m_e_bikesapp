<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atributo extends Model
{
    public function scopeNroOrden($query, $nroOrden)
    {
        return $query->where('nroOrden', $nroOrden);
    }

    public function scopeNroSubitem($query, $nroSubitem)
    {
        return $query->where('nroSubitem', $nroSubitem);
    }

    public function scopeNroSubitemDistinto($query, $nroSubitem)
    {
        return $query->where('nroSubitem', '<>',$nroSubitem);
    }

    public function scopeIdMedicion($query, $idMedicion)
    {
        return $query->where('idMedicion', $idMedicion);
    }
}
