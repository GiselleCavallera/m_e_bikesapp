<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetricaReferencia extends Model
{
    protected $table = 'metricas_referencia';

    public function scopeId($query, $id)
    {
        return $query->where('id', $id);
    }
}
