<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Slide;
use App\TheLoai;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
           
            View::composer('*',function($view){
                $view->with('user_login',Auth::user());
            });
            View::composer('*',function($view){
                $view->with('theloai',Theloai::all());
            });

          

        

        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
