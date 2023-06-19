<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\User;
use App\Models\pesanan_users;
use App\Models\transaksi_manuals;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class MainController extends Controller
{

    // Home Page
public function home(){
       return view('main.home');
}
    // Produk View
public function produk_view4234234($id)
{

    $mainpolopot = Produk::where('id', $id)->first();
    if(isset(Auth::user()->id) ){

        if(isset($mainpolopot->id)){

    $periksa_hitung = pesanan_users::where('produk_id', $mainpolopot->produk_id )->where('produk_buyer_id',   Auth::user()->id )->distinct('id_pesanan')->count();
if($periksa_hitung > 0){
    $not_in_chart_1 = pesanan_users::distinct('id_pesanan')->where('status_pesanan', 'sudah_dikirim')->where('produk_id', $mainpolopot->produk_id )->where('produk_buyer_id',   Auth::user()->id )->first();
    $not_in_chart_2 = pesanan_users::distinct('id_pesanan')->where('status_pesanan', 'transaksi_batal')->where('produk_id', $mainpolopot->produk_id )->where('produk_buyer_id',   Auth::user()->id )->first();
    $not_in_chart_3 = pesanan_users::distinct('id_pesanan')->where('status_pesanan', 'pengembalian_belum_ditinjau')->where('produk_id', $mainpolopot->produk_id )->where('produk_buyer_id',   Auth::user()->id )->first();
    $not_in_chart_4 = pesanan_users::distinct('id_pesanan')->where('status_pesanan', 'pengembalian_di_tolak_penjual')->where('produk_id', $mainpolopot->produk_id )->where('produk_buyer_id',   Auth::user()->id )->first();
    $not_in_chart_5 = pesanan_users::distinct('id_pesanan')->where('status_pesanan', 'pengembalian_di_approve_penjual')->where('produk_id', $mainpolopot->produk_id )->where('produk_buyer_id',   Auth::user()->id )->first();
    $not_in_chart_6 = pesanan_users::distinct('id_pesanan')->where('status_pesanan', 'di_komplain')->where('produk_id', $mainpolopot->produk_id )->where('produk_buyer_id',   Auth::user()->id )->first();
    $not_in_chart_7 = pesanan_users::distinct('id_pesanan')->where('status_pesanan', 'di_keranjang')->where('produk_id', $mainpolopot->produk_id )->where('produk_buyer_id',   Auth::user()->id )->first();
    $not_in_chart_8 = pesanan_users::distinct('id_pesanan')->where('status_pesanan', 'sedang_dikirim')->where('produk_id', $mainpolopot->produk_id )->where('produk_buyer_id',   Auth::user()->id )->first();
    $not_in_chart_9 = pesanan_users::distinct('id_pesanan')->where('status_pesanan', 'di_konfirmasi')->where('produk_id', $mainpolopot->produk_id )->where('produk_buyer_id',   Auth::user()->id )->first();
    $not_in_chart_10 = pesanan_users::distinct('id_pesanan')->where('status_pesanan', 'belum_ditinjau')->where('produk_id', $mainpolopot->produk_id )->where('produk_buyer_id',   Auth::user()->id )->first();
    if(empty($mainpolopot->id)){
    abort(404);
    }elseif(isset($mainpolopot->id)) {
    return view('main.produk', compact('mainpolopot' , 'not_in_chart_1', 'not_in_chart_2', 'not_in_chart_3', 'not_in_chart_4', 'not_in_chart_5', 'not_in_chart_6', 'not_in_chart_7', 'not_in_chart_8', 'not_in_chart_9', 'not_in_chart_10') );
    }


}elseif ($periksa_hitung < 0) {
    if(empty($mainpolopot->id)){
   abort(404);
   }elseif(isset($mainpolopot->id)) {
   return view('main.produk', compact('mainpolopot') );
    }
}else{
    if(empty($mainpolopot->id)){
   abort(404);
   }elseif(isset($mainpolopot->id)) {
   return view('main.produk', compact('mainpolopot') );
    }
}

}elseif(empty($mainpolopot->produk_id)){
    abort(404);
}

}elseif(empty(Auth::user()->id)){
   if(empty($mainpolopot->id)){
   abort(404);
   }elseif(isset($mainpolopot->id)) {
   return view('main.produk', compact('mainpolopot') );
    }
}
}


// view produk pembeli
public function produk_buyer_view()
{
    // view produk pesanan pembeli with status belum_ditinjau
    $produk_belum_ditinjau = pesanan_users::all()->where('produk_buyer_id', Auth::user()->id )->where('status_pesanan', 'belum_ditinjau')->where('kuantitas' ,'>', '0');

    // view produk pesanan pembeli with status di_keranjang
    $produk = pesanan_users::all()->where('produk_buyer_id', Auth::user()->id )->where('status_pesanan', 'di_keranjang');

    // view produk pesanan pembeli with status di_keranjang with variable to delete pesanan in keranjang
    $produk_deleter_helper = pesanan_users::all()->where('produk_buyer_id', Auth::user()->id )->where('status_pesanan', 'di_keranjang');
    // view produk pesanan pembeli with status di_keranjang helper
    $produk_checker_helper = Produk::all();

    // view produk pesanan pembeli with status di_konfirmasi
    $produk_sudah_ditinjau = pesanan_users::all()->where('produk_buyer_id', Auth::user()->id )->where('status_pesanan', 'di_konfirmasi');

    // view produk pesanan pembeli with status sedang_dikirim
    $produk_sedang_di_kirim = pesanan_users::all()->where('produk_buyer_id', Auth::user()->id )->where('status_pesanan', 'sedang_dikirim');

    // view produk pesanan pembeli with status sudah_dikirim
    $produk_sudah_di_kirim = pesanan_users::all()->where('produk_buyer_id', Auth::user()->id )->where('status_pesanan', 'sudah_dikirim');

    // view produk pesanan pembeli with status di_komplain
    $produk_di_komplain = pesanan_users::all()->where('produk_buyer_id', Auth::user()->id )->where('status_pesanan', 'di_komplain');

    // view produk pesanan pembeli with status pengembalian_belum_ditinjau
    $produk_req_pengembelian_active = pesanan_users::all()->where('produk_buyer_id', Auth::user()->id )->where('status_pesanan', 'pengembalian_belum_ditinjau');

    // view produk pesanan pembeli with status pengembalian_di_approve_penjual
    $pengembalian_di_approve_penjual = pesanan_users::all()->where('produk_buyer_id', Auth::user()->id )->where('status_pesanan', 'pengembalian_di_approve_penjual');

    // view produk pesanan pembeli with status pengembalian_di_tolak_penjual
    $pengembalian_di_tolak_penjual = pesanan_users::all()->where('produk_buyer_id', Auth::user()->id )->where('status_pesanan', 'pengembalian_di_tolak_penjual');

    // view produk pesanan pembeli with status transaksi_batal
    $transaksi_batal = pesanan_users::all()->where('produk_buyer_id', Auth::user()->id )->where('status_pesanan', 'transaksi_batal');

    // view function pesanan for 'Pembeli'
    if(Auth::user()->user_type == 'Pembeli'){
    return view('user.pembeli.pesanan', compact('produk', 'produk_belum_ditinjau', 'produk_sudah_ditinjau', 'produk_sedang_di_kirim', 'produk_sudah_di_kirim', 'produk_deleter_helper', 'produk_di_komplain', 'produk_req_pengembelian_active', 'pengembalian_di_approve_penjual', 'pengembalian_di_tolak_penjual', 'produk_checker_helper', 'transaksi_batal'));
}else{
        abort(404);
    }
}

// Pengaturan View
public function pengaturan(){
       return view('user.pembeli.pengaturan');
}

// Daftar Transaksi Pembeli
public function daftar_transaksi_pembeli(){
    $daftar = pesanan_users::all()->where('produk_buyer_id', Auth::user()->id )->where('status_pesanan', 'sudah_dikirim');

    $daftar_manual = transaksi_manuals::all()->where('user_id', Auth::user()->id );
    if(Auth::user()->user_type == 'Pembeli'){
    return view('user.pembeli.daftar_transaksi', compact('daftar', 'daftar_manual'));
    }else{
       abort(404);
    }
}



// Fetch All Data To Main Page
public function get_data_produk_main()
{
    $mainpolopot = Produk::all();
    return view('main.home', compact('mainpolopot'));
}

// Run CronJob For transaksi_batal
public function run()
    {
    $format = 'Y-m-d H:i:s'; // format bisa di ganti atau di sesuaikan dengan time format di table

        $timezone = 'Asia/Singapore'; // timezone harus sama di setting dengan settingan timezone sql server dan cronjob

        $timeThreshold = Carbon::now($timezone)->subMinutes(5)->format($format);
    $rows = pesanan_users::where('status_pesanan', 'belum_ditinjau')->where('created_at', '<=', Carbon::createFromFormat($format, $timeThreshold, $timezone) )->get();
    
    foreach ($rows as $row) {
        $row->status_pesanan = 'transaksi_batal';
        $row->save();
        if($row->save()){
            $d = User::where('id', $row->produk_owner_id)->first();
            $d->decrement('saldo', $row->harga_produk * $row->kuantitas);
            $d->save();
            if($d->save()){
            $r = User::where('id', $row->produk_buyer_id)->first();
            $r->increment('saldo', $row->harga_produk * $row->kuantitas);
            $r->save();   
            if($r->save()){
            $sr = Produk::where('produk_owner_id', $row->produk_owner_id)->where('produk_id', $row->produk_id)->first();
            $sr->increment('kuantitas', $row->kuantitas);
            $sr->save();    
            }
            }
        }
        return response()->json(['message' => 'Row updated successfully']);
    }

    return response()->json(['message' => 'No rows to update']);
    }



public function search(Request $request)
{
    $query = $request->get('query');
    $minPrice = $request->get('min_price');
    $maxPrice = $request->get('max_price');

    $products = Produk::where('produk_name', 'like', "%{$query}%");

    if ($minPrice !== null && $maxPrice !== null) {
        $products = $products->whereBetween('produk_price', [$minPrice, $maxPrice]);
    }

    $products = $products->get();

    if ($products->isEmpty()) {
        return view('main.search')->with('message', 'No products found.');
    }

    return view('main.search', compact('products'));
}



}


