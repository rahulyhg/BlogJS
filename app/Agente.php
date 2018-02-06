<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agente extends Model
{
    protected $table = "agente";
    protected $primaryKey = "id_agente";
    public $timestamps = false;
}
