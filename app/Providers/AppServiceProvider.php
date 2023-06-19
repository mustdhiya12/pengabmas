<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\Produk;
use App\Models\pesanan_users;
use Illuminate\Support\Facades\Auth;

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
        View::composer('main.navbar', function ($view) {
            if(empty(Auth::user()->id) ){

        
    }elseif(isset(Auth::user()->id) ){
        $hitung = pesanan_users::all()->where('produk_buyer_id', Auth::user()->id )->where('status_pesanan', 'di_keranjang')->count();
        if($hitung >= 0  ){
        $view->with('hitung', $hitung);
        }elseif($hitung == 0 ){

        }
    }
    });
    }
}
