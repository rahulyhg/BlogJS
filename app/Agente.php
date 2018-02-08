<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Agente extends Model
{
    protected $table = "agente";
    protected $primaryKey = "id_agente";
    public $timestamps = false;

    public function obtenerEstadisticas()
    {
        $query = DB::table($this->table)
                ->select('*', DB::raw('count(id_agente) as Total'))
                ->groupBy('url')
                ->paginate(5);

        return $query;
    }
}
