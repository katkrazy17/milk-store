<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('includes.menu',function($view){
            $loai_sp=Category::all();
            //$view->with('loai_sp',$loai_sp);
            $view->with('loai_sp',$loai_sp);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
