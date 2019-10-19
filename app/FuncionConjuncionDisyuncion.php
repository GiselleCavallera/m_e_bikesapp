<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuncionConjuncionDisyuncion extends Model
{
    protected $table = 'funciones_conjuncion_disyuncion';

    public function scopeCantidadElementos($query, $n)
    {
    	return $query->where('cantidadValoresDeEntrada', $n);
    }

    public function scopeOperador($query, $operador)
    {
    	return $query->where('simbolo', $operador);
    }
}
