<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcaracteristica extends Model
{
    protected $table = 'subcaracteristicas';

    public function scopeRequerimiento($query, $idRequerimiento)
    {
    	return $query->where('idRequerimiento', "$idRequerimiento");
    }
}
