<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Post;
use App\Categoria;
use App\Subcategoria;

class AdministradorController extends Controller
{
    public function posts()
    {
        return view('roles.admin.posts', [
            'list_group_item' => 1,
            'posts'           => Post::where('activo', 1)->get(),
            'subcategorias'   => Subcategoria::where('activo', 1)->get(),
        ]);
    }

    public function nuevoPost(Request $request)
    {
        $this->validate($request, [
            'titulo'      => 'required|min:5|max:191',
            'foto'        => 'image:jpg,png,jpeg,JPG,JPEG,PNG|max:5000',
            'desc_imagen' => 'required|min:10|max:191',
            'breve_desc'  => 'required|min:25|max:255',
            'editor1'     => 'required',
            'etiquetas'   => 'required'
        ],
        [
            'titulo.required'      => 'Es necesario ingresar el titulo del post.',
            'titulo.min'           => 'El titulo no puede ser menor a 5 caracteres.',
            'titulo.max'           => 'El titulo no puede exceder los 191 caracteres.',
            'foto.image'           => 'La imagen del post tiene el formato incorrecto.',
            'foto.max'             => 'La imagen no puede exceder los 5000 MB.',
            'desc_imagen.required' => 'La descripcion de la imagen es necesaria.',
            'desc_imagen.min'      => 'La descripcion de la imagen no puede ser menor a 10 caracteres.',
            'desc_imagen.max'      => 'La descripcion de la imagen no puede exceder los 191 caracteres.',
            'breve_desc.required'  => 'Es necesario ingresar la descripción breve del post.',
            'breve_desc.min'       => 'La descripción breve no puede ser menor a 25 caracteres.',
            'breve_desc.max'       => 'La descripción breve no puede exceder los 255 caracteres.',
            'editor1.required'     => 'Es necesario ingresar la descripción del post.',
            'etiquetas.required'   => 'Es necesario ingresar etiquetas para el post.'
        ]);

        $post = new Post;

        $post->id_post           = null;
        $post->id_subcategoria   = $request->input('subcategoria');
        $post->id_usuario        = Auth::user()->id;
        $post->titulo            = $request->input('titulo');
        $post->descripcion_foto  = $request->input('desc_imagen');
        $post->breve_descripcion = $request->input('breve_desc');
        $post->descripcion       = json_encode($request->input('editor1'));
        $post->etiquetas         = json_encode(explode(", ",$request->input('etiquetas')));
        $post->created_at        = date('Y-m-d H:i:s');
        $post->updated_at        = null;
        $post->activo            = 1;

        $post->save();

        $foto = $request->file('foto');

        $foto->move('img/posts/', $post->id_post.".jpg");

        $request->session()->flash('status', 'El post fue publicado correctamente.');

        return redirect('/admin/posts');
    }

    public function editarPost(Request $request)
    {
        $this->validate($request, [
            'titulo'      => 'required|min:5|max:191',
            'foto'        => 'image:jpg,png,jpeg,JPG,JPEG,PNG|max:5000',
            'desc_imagen' => 'required|min:10|max:191',
            'breve_desc'  => 'required|min:25|max:255',
            'editor2'     => 'required',
            'etiquetas'   => 'required'
        ],
        [
            'titulo.required'      => 'Es necesario ingresar el titulo del post.',
            'titulo.min'           => 'El titulo no puede ser menor a 5 caracteres.',
            'titulo.max'           => 'El titulo no puede exceder los 191 caracteres.',
            'foto.image'           => 'La imagen del post tiene el formato incorrecto.',
            'foto.max'             => 'La imagen no puede exceder los 5000 MB.',
            'desc_imagen.required' => 'La descripcion de la imagen es necesaria.',
            'desc_imagen.min'      => 'La descripcion de la imagen no puede ser menor a 10 caracteres.',
            'desc_imagen.max'      => 'La descripcion de la imagen no puede exceder los 191 caracteres.',
            'breve_desc.required'  => 'Es necesario ingresar la descripción breve del post.',
            'breve_desc.min'       => 'La descripción breve no puede ser menor a 25 caracteres.',
            'breve_desc.max'       => 'La descripción breve no puede exceder los 255 caracteres.',
            'editor2.required'     => 'Es necesario ingresar la descripción del post.',
            'etiquetas.required'   => 'Es necesario ingresar etiquetas para el post.'
        ]);

        $post = Post::where('id_post', $request->input('id'))->first();

        $post->id_subcategoria   = $request->input('subcategoria');
        $post->titulo            = $request->input('titulo');
        $post->descripcion_foto  = $request->input('desc_imagen');
        $post->breve_descripcion = $request->input('breve_desc');
        $post->descripcion       = json_encode($request->input('editor2'));
        $post->etiquetas         = json_encode(explode(", ",$request->input('etiquetas')));
        $post->updated_at        = date('Y-m-d H:i:s');

        $post->save();

        if ($request->file('foto')) {

            $foto = $request->file('foto');

            $foto->move('img/posts/', $post->id_post.".jpg");

        }

        $request->session()->flash('status', 'El post fue publicado correctamente.');

        return redirect('/admin/posts');
    }

    public function eliminarPost(Request $request)
    {
        $post = Post::where('id_post', $request->input('id'))->first();

        $post->updated_at = date('Y-m-d H:i:s');
        $post->activo     = 0;

        $post->save();

        $request->session()->flash('status', 'El post fue eliminado correctamente.');

        return redirect('/admin/posts');
    }

    public function categorias()
    {
        return view('roles.admin.categorias', [
            'list_group_item' => 2,
            'categorias'      => Categoria::where('activo', 1)->get(),
        ]);
    }

    public function nuevaCategoria(Request $request)
    {
        $this->validate($request, [
            'categoria' => 'required|min:3|max:191',
        ],
        [
            'categoria.required' => 'Es necesario rellenar el campo de categoria.',
            'categoria.min'      => 'La categoria no puede tener menos de 3 caracteres.',
            'categoria.max'      => 'La categoria no puede exceder los 191 caracteres.'
        ]);

        $categoria = new Categoria;

        $categoria->id_categoria = null;
        $categoria->categoria    = $request->input('categoria');
        $categoria->created_at   = date('Y-m-d H:i:s');
        $categoria->updated_at   = null;
        $categoria->activo       = 1;

        $categoria->save();

        $request->session()->flash('status', 'Categoria añadida correctamente.');

        return redirect('/admin/categorias');
    }

    public function editarCategoria(Request $request)
    {
        $this->validate($request, [
            'categoria' => 'required|min:3|max:191',
        ],
        [
            'categoria.required' => 'Es necesario rellenar el campo de categoria.',
            'categoria.min'      => 'La categoria no puede tener menos de 3 caracteres.',
            'categoria.max'      => 'La categoria no puede exceder los 191 caracteres.'
        ]);

        $categoria = Categoria::where('id_categoria', $request->input('id'))->first();

        $categoria->categoria  = $request->input('categoria');
        $categoria->updated_at = date('Y-m-d H:i:s');

        $categoria->save();

        $request->session()->flash('status', 'La categoria fue modificada correctamente');

        return redirect('/admin/categorias');
    }

    public function eliminarCategoria(Request $request)
    {
        $categoria = Categoria::where('id_categoria', $request->input('id'))->first();

        $categoria->updated_at = date('Y-m-d H:i:s');
        $categoria->activo     = 0;

        $categoria->save();

        $request->session()->flash('status', 'La categoria fue eliminada correctamente.');

        return redirect('/admin/categorias');
    }

    public function subcategorias()
    {
        return view('roles.admin.subcategorias', [
            'list_group_item' => 3,
            'categorias'      => Categoria::where('activo', 1)->get(),
            'subcategorias'   => Subcategoria::where('activo', 1)->get(),
        ]);
    }

    public function nuevaSubcategoria(Request $request)
    {
        $this->validate($request, [
            'subcategoria' => 'required|min:3|max:191',
        ],
        [
            'subcategoria.required' => 'Es necesario ingresar el nombre de la subcategoria.',
            'subcategoria.min'      => 'La subcategoria no puede tener menos de 3 caracteres.',
            'subcategoria.max'      => 'La subcategoria no puede exceder los 191 caracteres.'
        ]);

        $subcategoria = new Subcategoria;

        $subcategoria->id_subcategoria = null;
        $subcategoria->id_categoria    = $request->input('categoria');
        $subcategoria->subcategoria    = $request->input('subcategoria');
        $subcategoria->created_at      = date('Y-m-d H:i:s');
        $subcategoria->updated_at      = null;
        $subcategoria->activo          = 1;

        $subcategoria->save();

        $request->session()->flash('status', 'La subcategoria fue registrada correctamente.');

        return redirect('/admin/subcategorias');
    }

    public function editarSubcategoria(Request $request)
    {
        $this->validate($request, [
            'subcategoria' => 'required|min:3|max:191',
        ],
        [
            'subcategoria.required' => 'Es necesario ingresar el nombre de la subcategoria.',
            'subcategoria.min'      => 'La subcategoria no puede tener menos de 3 caracteres.',
            'subcategoria.max'      => 'La subcategoria no puede exceder los 191 caracteres.'
        ]);

        $subcategoria = Subcategoria::where('id_subcategoria', $request->input('id'))->first();

        $subcategoria->id_categoria = $request->input('categoria');
        $subcategoria->subcategoria = $request->input('subcategoria');
        $subcategoria->updated_at   = date('Y-m-d H:i:s');

        $subcategoria->save();

        $request->session()->flash('status', 'La subcategoria fue actualizada correctamente.');

        return redirect('/admin/subcategorias');
    }

    public function eliminarSubcategoria(Request $request)
    {
        $subcategoria = Subcategoria::where('id_subcategoria', $request->input('id'))->first();

        $subcategoria->updated_at = date('Y-m-d H:i:s');
        $subcategoria->activo     = 0;

        $subcategoria->save();

        $request->session()->flash('status', 'La subcategoria fue eliminada correctamente.');

        return redirect('/admin/subcategorias');
    }

    public function estadisticas(){}

    public function newsletter(){}

    public function generarPassword()
    {
        $contrasena = "barcelona1994";

        $contrasenaHash = Hash::make($contrasena);

        dd($contrasenaHash);
    }
}
