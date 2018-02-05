<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Jenssegers\Agent\Agent;

use View;
use App\Categoria;
use App\Agente;

class NavbarFooterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $agente = new Agente;
        $agent  = new Agent();

        dd($agent);

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
