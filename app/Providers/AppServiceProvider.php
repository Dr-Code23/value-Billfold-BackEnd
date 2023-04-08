<?php

namespace App\Providers;
use App\Repositories\Interfaces\RolesRepositoryInterface;
use App\Repositories\RolesRepository;
use App\Repositories\Interfaces\AdminsRepositoryInterface;
use App\Repositories\AdminsRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RolesRepositoryInterface::class, RolesRepository::class);
        $this->app->bind(AdminsRepositoryInterface::class, AdminsRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        app()->singleton('lang',function(){
            if(session()->has('lang')){
                return session()->get('lang');
            }else{
                return 'en';
            }
        });
    }
}
