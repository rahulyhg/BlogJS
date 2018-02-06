<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Jenssegers\Agent\Agent;

use App\Agente;
use App\Post;
use App\Categoria;

class PostController extends Controller
{
    protected $post;
    protected $agent;

    public function __construct()
    {
        $this->post = new Post;
        $this->agent = new Agent();
    }

    public function index($id)
    {
        $this->nuevoAgente();

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
