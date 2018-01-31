<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Post;
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

    public function generarPassword()
    {
        $contrasena = "barcelona1994";

        $contrasenaHash = Hash::make($contrasena);

        dd($contrasenaHash);
    }
}
