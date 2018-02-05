<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Categoria;

class PostController extends Controller
{
    protected $post;

    public function __construct()
    {
        $this->post = new Post;
    }

    public function index($id)
    {
        $post = $this->post->posts(1, " AND post.id_post = ".$id, false);

        foreach (json_decode($post->etiquetas) as $key => $etiqueta) {
            $etiquetas = $etiqueta;
        }

        $metas = [
            'titulo'      => $post->titulo.' | Jordy Santamaria',
            'imagen'      => asset('img/posts/'.$post->id_post.'.jpg'),
            'descripcion' => $post->breve_descripcion,
            'fecha'       => $post->created_at,
            'keywords'    => $etiquetas,
            'categoria'   => $post->categoria,
            'name'        => $post->name,
            'ruta_actual' => url()->current()
        ];

        return view('post', [
            'post'       => $post,
            'categorias' => Categoria::where('activo', 1)->get(),
            'metas'      => $metas
        ]);
    }
}
