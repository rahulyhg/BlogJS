<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Categoria;
use App\Newsletter;

class IndexController extends Controller
{
    protected $post;

    public function __construct()
    {
        $this->post = new Post;
    }

    public function index()
    {
        $metas = [
            'titulo'      => 'Jordy Santamaria | Noticias, Criticas, Gameplays y más',
            'imagen'      => asset('img/logo/Logo.png'),
            'descripcion' => 'Enterate de los más nuevo en Tecnologia, Videojuegos, Criticas sobre peliculas y Gameplays que realizo.',
            'fecha'       => date('Y-m-d H:i:s'),
            'keywords'    => 'Noticias de Peliculas, Noticias de Videojuegos, Noticias de tecnologia, Tecnologia, Peliculas, Videojuegos, Gameplays, Xbox One, Youtuber',
            'categoria'   => 'Menu Principal',
            'name'        => 'Jordy Santamaria',
            'ruta_actual' => url()->current()
        ];

        return view('index', [
            'jumbotron'  => $this->post->posts(1, null, false),
            'nuevas'     => $this->post->posts(4, null, true),
            'categorias' => Categoria::where('activo', 1)->get(),
            'metas'      => $metas,
        ]);
    }

    public function nuevoNewsletter(Request $request)
    {
        $this->validate($request, [
            'correo' => 'required|email|unique:newsletter',
        ],
        [
            'correo.required' => 'Es necesario ingresar el correo electronico.',
            'correo.email'    => 'El formato del correo es incorrecto.',
            'correo.unique'   => 'El correo ya se encuentra registrado en el newsletter.'
        ]);

        $newsletter = new Newsletter;

        $newsletter->id_newsletter = null;
        $newsletter->correo        = $request->input('correo');
        $newsletter->created_at    = date('Y-m-d H:i:s');

        $newsletter->save();

        $request->session()->flash('status', 'Te has registrado correctamente al Newsletter.');

        return redirect('/');
    }
}
