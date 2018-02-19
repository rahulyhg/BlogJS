<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Agente extends Model
{
    protected $table = "agente";
    protected $primaryKey = "id_agente";
    public $timestamps = false;

    /**
     * [Funcion creada para obtener las estadisticas generales de la pagina]
     * @return mixed
     * @author Jordy Santamaria [santmjoy@gmail.com]
     */
    public function obtenerEstadisticas()
    {
        $query = DB::table($this->table)
                ->select('*', DB::raw('count(id_agente) as Total'))
                ->groupBy('url')
                ->orderBy('Total', 'DESC')
                ->paginate(5);

        return $query;
    }
}
