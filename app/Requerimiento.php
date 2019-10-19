<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requerimiento extends Model
{
    protected $table = 'requerimientos';

    public function scopeMedicion($query, $idMedicion)
    {
    	return $query->where('idMedicion', $idMedicion);
    }
}
