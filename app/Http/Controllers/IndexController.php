<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Jenssegers\Agent\Agent;

use App\Agente;
use App\Post;
use App\Categoria;
use App\Subcategoria;
use App\Newsletter;

class IndexController extends Controller
{
    protected $post;
    protected $agent;

    public function __construct()
    {
        $this->post = new Post;
        $this->agent = new Agent();
    }

    public function index()
    {
        $this->nuevoAgente();

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
            'jumbotron'     => $this->post->posts(1, null, false),
            'nuevas'        => $this->post->posts(5, "AND post.id_post <> (SELECT id_post FROM post ORDER BY id_post DESC LIMIT 1)", true),
            'categorias'    => Categoria::where('activo', 1)->get(),
            'metas'         => $metas,
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

    public function nuevoAgente()
    {
        $agente = new Agente;

        $agente->id_agente         = null;
        $agente->navegador         = $this->agent->browser();
        $agente->sistema_operativo = $this->agent->platform();
        $agente->lenguaje          = json_encode($this->agent->languages());
        $agente->url               = url()->current();
        $agente->created_at        = date('Y-m-d H:i:s');

        $agente->save();
    }
}
