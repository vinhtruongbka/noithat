<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Cart;
use Auth;
use App\User;
use Hash;

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
         Validator::extend('AuthPassword', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, Auth::user()->password);
        });
         Schema::defaultStringLength(191);
    }
}
