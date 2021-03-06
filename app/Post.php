<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    protected $table = "post";
    protected $primaryKey = "id_post";

    /**
     * [Funcion creada para obtener los post junto con su nombre de categoria y subcategoria]
     * @var $limit [integer]
     * @var $where [array]
     * @var $type [bool]
     * @return mixed
     * @author Jordy Santamaria [santmjoy@gmail.com]
     */
    public function posts($limit, $where, $type)
    {
        $result = DB::table($this->table)
            ->selectRaw("post.id_post, post.titulo, post.descripcion_foto, post.breve_descripcion, post.descripcion, post.etiquetas, post.created_at, categoria.id_categoria, categoria.categoria, users.name, users.info, subcategoria.subcategoria")
            ->join('subcategoria', 'post.id_subcategoria', '=', 'subcategoria.id_subcategoria')
            ->join('categoria', 'categoria.id_categoria', '=', 'subcategoria.id_categoria')
            ->join('users', 'post.id_usuario', '=', 'users.id')
            ->whereRaw("post.activo = 1 ".$where)
            ->orderByRaw('post.id_post DESC');

        if ($type == true) {
            return $result->paginate($limit);
        } else {
            $result->limit($limit);
            return $result->first();
        }

    }
}
