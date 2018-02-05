<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $table = "newsletter";
    protected $primaryKey = "id_newsletter";
    public $timestamps = false;
}
