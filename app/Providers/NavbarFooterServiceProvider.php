<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use View;
use App\Categoria;

class NavbarFooterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.app', function($view){
            $view->with([
                'categorias' => Categoria::where('activo', 1)->get(),
            ]);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
