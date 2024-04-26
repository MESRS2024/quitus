<?php

namespace App\Providers;

use App;
use App\Models\Dossier;
use App\Models\Etablissement;
use App\Models\Register;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use jeremykenedy\LaravelRoles\Models\Role;
use View;

class ViewServiceProvider extends ServiceProvider
{
    private $nullSelected = [null => 'Select .... '];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.app', function ($view){

        });

        //********* Dashboard Views
        View::composer(['Home.partials.register-stats'], function ($view) {

        });
        //********* Users Views
        View::composer(['users.fields'], function ($view) {
            $rolesItems = $this->nullSelected + Role::all()->pluck('description', 'id')->toArray();
            $view->with('rolesItems', $rolesItems);

        });





    }
}
