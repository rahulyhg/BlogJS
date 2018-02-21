<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Categoria;
use App\Subcategoria;

class SitemapController extends Controller
{
    public function index()
    {
        return response()->view('sitemap.index')->header('Content-Type', 'text/xml');
    }

    public function categorias()
    {
        return response()->view('sitemap.categorias', [
            'categorias' => Categoria::where('activo', 1)->orderBy('id_categoria', 'DESC')->take(200)->get()
        ]);
    }

    public function series()
    {
        return response()->view('sitemap.series', [
            'series' => Subcategoria::where('activo', 1)->orderBy('id_subcategoria', 'DESC')->take(200)->get()
        ]);
    }

    public function posts()
    {
        return response()->view('sitemap.posts', [
            'posts' => Post::where('activo', 1)->orderBy('id_post', 'DESC')->take(200)->get()
        ]);
    }
}
