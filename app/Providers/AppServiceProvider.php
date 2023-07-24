<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\Produk;
use App\Models\pesanan_users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



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
        
        Blade::directive('formatReplyTime', function ($expression) {
            return "<?php echo formatReplyTime($expression); ?>";
        });
    
        View::composer('main.navbar', function ($view) {
            if (empty(Auth::user()->id)) {
            } elseif (isset(Auth::user()->id)) {
                $hitung = pesanan_users::all()->where('produk_buyer_id', Auth::user()->id)->where('status_pesanan', 'di_keranjang')->count();
                if ($hitung >= 0) {
                    $view->with('hitung', $hitung);
                } elseif ($hitung == 0) {
                }
            }
        });
    }

    public function formatReplyTime($time)
    {
        $currentTime = now();
        $diff = $currentTime->diff($time);
        $unit = '';
        
        if ($diff->h > 0) {
            $unit = $diff->h == 1 ? 'hour' : 'hours';
            return $diff->h . ' ' . $unit . ' ago';
        } elseif ($diff->i > 0) {
            $unit = $diff->i == 1 ? 'minute' : 'minutes';
            return $diff->i . ' ' . $unit . ' ago';
        } elseif ($diff->s > 0) {
            $unit = $diff->s == 1 ? 'second' : 'seconds';
            return $diff->s . ' ' . $unit . ' ago';
        }
        
        return null;
    }
}
