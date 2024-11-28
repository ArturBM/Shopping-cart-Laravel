<?php

namespace App\Providers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $categoriasMenu = Categoria::all();
        view()->share('categoriasMenu', $categoriasMenu);

        Gate::define('ver-produto', function(User $user, Produto $produto){
            return $user->id === $produto->id_user;
        });
    }
}
