<?php

namespace App\Providers;

use App\Mail\UserCreated;
use App\Mail\UserMailChanged;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use function foo\func;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        User::created(function ($user) {
            Mail::to($user->email)->send(new UserCreated($user));
        });
        User::updated(function ($user) {
            if ($user->isDirty('email')){
                Mail::to($user->email)->send(new UserMailChanged($user));
            }
        });

        Product::updated(function ($product) {
            if ($product->quantity == 0 && $product->estaDisponible()) {
                $product->status = Product::PRODUCTO_NO_DISPONIBLE;
                $product->save();
            }
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
