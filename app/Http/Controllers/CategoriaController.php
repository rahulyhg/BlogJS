<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria;
use App\Subcategoria;
use App\Post;

class CategoriaController extends Controller
{
    protected $post;

    public function __construct()
    {
        $this->post = new Post;
    }

    public function index($id, $categoria)
    {
        $categoria = Categoria::where('id_categoria', $id)->first();

        $metas = [
            'titulo'      => $categoria->categoria.' | Jordy Santamaria',
            'imagen'      => asset('img/categorias/'.$categoria->id_categoria.'.jpg'),
            'descripcion' => $categoria->categoria,
            'fecha'       => $categoria->created_at,
            'keywords'    => 'Noticias de Peliculas, Noticias de Videojuegos, Noticias de tecnologia, Tecnologia, Peliculas, Videojuegos, Gameplays, Xbox One, Youtuber',
            'categoria'   => $categoria->categoria,
            'name'        => 'Jordy Santamaria',
            'ruta_actual' => url()->current()
        ];

        return view('categoria', [
            'categoria'     => $categoria,
            'posts'         => $this->post->posts(3, " AND categoria.id_categoria = ".$id, true),
            'subcategorias' => Subcategoria::where('id_categoria', $id)->take(3)->get(),
            'metas'         => $metas
        ]);
    }
}
