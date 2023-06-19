<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
#use Illuminate\Support\Facades\Auth;
#use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route Post Midtrans API Callback
Route::post('/poin/callback', [UserController::class, 'poin_callback']);

Route::get('/poin/done', [UserController::class, 'poin_done']);

Route::get('/poin/cancel', [UserController::class, 'poin_cancel']);

Route::post('/user_api/login', [UserController::class, 'login_api']);

Route::post('/user_api/tambah', [UserController::class, 'tambah_produk_api']);

Route::put('/user_api/ubah_produk', [UserController::class, 'update_api']);

Route::put('/user_api/ubah_produk_admin', [UserController::class, 'update_api_admin']);

Route::post('/user_api/peninjauan', [UserController::class, 'peninjauan_run_api']);

Route::post('/user_api/pengembalian', [UserController::class, 'peninjauan_pengembalian_api']);

Route::put('/user_api/hapus', [UserController::class, 'hapus_produk_aksi_api']);

Route::put('/user_api/produk/hapus/admin', [UserController::class, 'hapus_produk_aksi_api_admin']);

Route::get('/user_api/get_data_penjual', [UserController::class, 'get_penjual_produk']);

Route::get('/user_api/get_data_pesanan_pembeli', [UserController::class, 'lihat_produk_pesanan_api_pembeli']);

Route::get('/user_api/get_pesanan_penjual', [UserController::class, 'get_penjual_pesanan']);

Route::get('/user_api/get_data_pembeli', [UserController::class, 'lihat_produk_api_pembeli']);

Route::get('/user_api/get_data_admin', [UserController::class, 'lihat_produk_api_admin']);

Route::get('/user_api/lihat_yang_belum_ditinjau', [UserController::class, 'lihat_peninjauan_api']);

Route::post('/user_api/keranjang', [UserController::class, 'masukkan_kedalam_keranjang_api']);

Route::put('/user_api/hapus/pesanan', [UserController::class, 'penghapus_pesanan_api']);

Route::post('/user_api/settings', [UserController::class, 'pengaturan_user_api']);

Route::post('/user_api/checkout', [UserController::class, 'checkout_api']);

Route::get('/user_api/pilih/users/adm', [UserController::class, 'kirim_saldo_view_api']);

Route::post('/user_api/pilih/users/adm/run', [UserController::class, 'doners_kirim_saldo_api']);
