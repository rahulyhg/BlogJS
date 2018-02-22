<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Sitemap;

use App\Post;
use App\Categoria;
use App\Subcategoria;

class SitemapController extends Controller
{
    public function index()
    {
        Sitemap::addSitemap(url('/'));
        Sitemap::addSitemap(url('/sitemap/posts.xml'));
        Sitemap::addSitemap(url('/sitemap/categorias.xml'));
        Sitemap::addSitemap(url('/sitemap/series.xml'));

        return Sitemap::index();
    }

    public function categorias()
    {
        $categorias = Categoria::where('activo', 1)->orderBy('id_categoria', 'DESC')->take(200)->get();

        foreach ($categorias  as $categoria) {

            Sitemap::addTag(url('/categoria/'.$categoria->id_categoria, $categoria->categoria), $categoria->created_at, 'daily', '0.7');

        }

        return Sitemap::render();
    }

    public function series()
    {

        $series = Subcategoria::where('activo', 1)->orderBy('id_subcategoria', 'DESC')->take(200)->get();

        foreach ($series as $serie) {

            Sitemap::addTag(url('/serie/'.$serie->id_subcategoria, $serie->subcategoria), $serie->created_at, 'daily', '0.8');

        }

        return Sitemap::render();

    }

    public function posts()
    {

        $posts = Post::where('activo', 1)->orderBy('id_post', 'DESC')->take(200)->get();

        foreach ($posts as $post) {

            Sitemap::addTag(url('/post/'.$post->id_post, str_replace(' ', '-', $post->titulo)), $post->created_at, 'daily', '0.9');

        }

        return Sitemap::render();

    }
}
