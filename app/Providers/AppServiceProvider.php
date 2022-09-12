<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        
        Validator::extend('iso_date', 'Penance316\Validators\IsoDateValidator@validateIsoDate');
        
        Validator::extend('gender', function ($attribute) 
        {
            return ((strcasecmp($attribute, 'male')) || (strcasecmp($attribute, 'female')));

        });
        
        
    }
}
