<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subcategoria;
use App\Categoria;
use App\Post;

class SerieController extends Controller
{
    protected $post;

    public function __construct()
    {
        $this->post = new Post;
    }

    public function index($id, $titulo)
    {
        $serie = Subcategoria::where('id_subcategoria', $id)->first();

        $metas = [
            'titulo'      => $serie->subcategoria.' | Jordy Santamaria',
            'imagen'      => asset('img/subcategorias/'.$serie->id_subcategoria.'.jpg'),
            'descripcion' => $serie->subcategoria,
            'fecha'       => $serie->created_at,
            'keywords'    => 'Noticias de Peliculas, Noticias de Videojuegos, Noticias de tecnologia, Tecnologia, Peliculas, Videojuegos, Gameplays, Xbox One, Youtuber',
            'categoria'   => $serie->subcategoria,
            'name'        => 'Jordy Santamaria',
            'ruta_actual' => url()->current()
        ];


        return view('serie', [
            'serie'      => $serie,
            'posts'      => $this->post->posts(3, " AND subcategoria.id_subcategoria = ".$id, true),
            'categorias' => Categoria::where('activo', 1)->get(),
            'metas'      => $metas
        ]);
    }
}
