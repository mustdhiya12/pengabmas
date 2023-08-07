<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MainController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route veiw logins
Route::get('/client/login', function () {
    return view('user.sign_in');  
})->middleware('guest')->name('user.sign_in');


// Route veiw register
Route::get('/client/register', function () {
    return view('user.sign_up');  
})->middleware('guest')->name('user.sign_up');


// Route veiw Dashboard
Route::get('/dashboard', [MainController::class, 'get_data_produk_profile'], function () {return view('user.dashboard');})->middleware('auth')->name('user.dashboard');

// Route veiw For function transaksi_main_admin_kelola
Route::get('/dashboard/admin/transaksi', [UserController::class, 'transaksi_main_admin_kelola'])->middleware('auth')->name('admin.transaksi');

// Route veiw For function notices
Route::get('/dashboard/noatices', [UserController::class, 'notices'])->middleware('auth')->name('dashboard.notices');

// Route veiw For function poin_manual
Route::get('/poin/manual', [UserController::class, 'poin_manual'])->middleware('auth')->name('poin.manual');

// Route post For function poin_manual_add
Route::post('/poin/manual/run', [UserController::class, 'poin_manual_add'])->middleware('auth')->name('poin.manual.run');

// Route post For function doners_kirim_saldo
Route::post('/dashboard/pilih/users/', [UserController::class, 'doners_kirim_saldo'])->middleware('auth')->name('admin.kirim.saldo.run');

// Route view For function kelola_users
Route::get('/dashboard/kelola/users', [UserController::class, 'kelola_users'])->middleware('auth')->name('admin.kelola');

// Route view For function kirim_saldo_view
Route::get('/dashboard/pilih/users', [UserController::class, 'kirim_saldo_view'])->middleware('auth')->name('admin.kirim.saldo');

// Route view For function kelola_users_edit
Route::get('/dashboard/kelola/users/{id}', [UserController::class, 'kelola_users_edit'])->middleware('auth')->name('admin.kelola.edit');

// Route view For function tambah
Route::get('/dashboard/tambah', [UserController::class, 'tambah'])->middleware('auth')->name('user.tambah');

// Route view For function peninjauan
Route::get('/dashboard/peninjauan', [UserController::class, 'peninjauan'])->middleware('auth')->name('user.peninjauan');

// Route post For function tambah_produk
Route::post('/dashboard/tambah', [UserController::class, 'tambah_produk'])->middleware('auth')->name('tambah.sedikit_aksi');

// Route post For function peninjauan_run
Route::post('/dashboard/peninjauan', [UserController::class, 'peninjauan_run'])->middleware('auth')->name('user.peninjauan.aksi');

// Route post For function peninjauan_pengembalian
Route::post('/dashboard/pengembalian', [UserController::class, 'peninjauan_pengembalian'])->middleware('auth')->name('user.pengembalian.aksi');

// Route view For function get_data_produk
Route::get('/dashboard/view/ubah', [UserController::class, 'get_data_produk'])->middleware('auth')->name('user.view_edit');

// Route view For function get_data_produk_adm
Route::get('/dashboard/admin/view/ubah', [UserController::class, 'get_data_produk_adm'])->middleware('auth')->name('admin.view_edit');

// Route view For function ubah
Route::get('/dashboard/view/ubah/{id}', [UserController::class, 'ubah'])->middleware('auth')->name('user.ubah');

// Route view For function ubah_adm
Route::get('/dashboard/admin/view/ubah/{id}', [UserController::class, 'ubah_adm'])->middleware('auth')->name('admin_produk.edit');

// Route put For function rus
Route::put('/dashboard/polpot/{id}', [UserController::class, 'rus'])->middleware('auth')->name('user.rus');

// Route put For function rus_adm
Route::put('/dashboard/adm/{id}', [UserController::class, 'rus_adm'])->middleware('auth')->name('admin.rus');

// Route put For function hapus_produk_aksi
Route::put('/dashboard/hapus/{id}', [UserController::class, 'hapus_produk_aksi'])->middleware('auth')->name('user.hapus');

// Route put For function hapus_produk_aksi_admin
Route::put('/dashboard/admin/produk/hapus/{id}', [UserController::class, 'hapus_produk_aksi_admin'])->middleware('auth')->name('admin.hapus');

// Route put For function penghapus_pesanan
Route::put('/dashboard/view/produk/{id}', [UserController::class, 'penghapus_pesanan'])->middleware('auth')->name('user.hapus.pesanan');

// Route view For function get_data_produk_main
Route::get('/', [MainController::class, 'get_data_produk_main'])->name('main.home');


Route::get('/shop', [MainController::class, 'get_data_produk_shop'])->name('main.shop');

// Route view For function privacy policy
Route::get('/pr', [MainController::class, 'pr'])->name('main.pr');

// Route post For function updateItems
Route::post('/dashboard/view/produk', [UserController::class, 'updateItems'])->middleware('auth')->name('34534534534534');

// Route post For function komplain
Route::post('/dashboard/view/produk/komplain', [UserController::class, 'komplain'])->middleware('auth')->name('komplain.pembeli');

// Route post For function pengembalian
Route::post('/dashboard/view/produk/pengembalian', [UserController::class, 'pengembalian'])->middleware('auth')->name('pengembalian.pembeli');

// Route view For function produk_buyer_view
Route::get('/dashboard/view/produk', [MainController::class, 'produk_buyer_view'])->middleware('auth')->name('main.produk');

// Route view For function pengaturan
Route::get('/dashboard/settings', [MainController::class, 'pengaturan'])->middleware('auth')->name('settings');

// Route view For function daftar_transaksi_pembeli
Route::get('/dashboard/daftar/transaksi', [MainController::class, 'daftar_transaksi_pembeli'])->middleware('auth')->name('daftar.transaksi');

// Route post For function pengaturan_user
Route::post('/dashboard/settings', [UserController::class, 'pengaturan_user'])->middleware('auth')->name('c32325235235');

// Route post For function kelola_users_edit_run
Route::post('/dashboard/kelola/users/{id}', [UserController::class, 'kelola_users_edit_run'])->middleware('auth')->name('kelola.adm.run');

// Route view For function produk_view4234234
Route::get('/produk/{id}', [MainController::class, 'produk_view4234234'])->name('main.apk');

// Route post For function masukkan_kedalam_keranjang
Route::post('/produk/{id}', [UserController::class, 'masukkan_kedalam_keranjang'])->middleware('auth')->name('keranjang.aksi');

// Route post For function sign_up_action
Route::post('/client/register', [UserController::class, 'sign_up_action'])->name('sign_up.action');

// Route post For function sign_in_action
Route::post('/client/login', [UserController::class, 'sign_in_action'])->name('sign_in.action');

// Route view For function logout
Route::get('/client/logout', [UserController::class, 'logout'])->name('logout');

// Route view For function poin
Route::get('/poin', [UserController::class, 'poin'])->middleware('auth')->name('poin');

// Route post For function poin_aktion
Route::post('/poin/checkout', [UserController::class, 'poin_aktion'])->middleware('auth')->name('poin.action');

// Route view Kurir For function job_orderan_kurir
Route::get('/dashboard/job', [UserController::class, 'job_orderan_kurir'])->middleware('auth')->name('job');

// Route view Kurir For function job_orderan_aktif_kurir
Route::get('/dashboard/job/aktif', [UserController::class, 'job_orderan_aktif_kurir'])->middleware('auth')->name('job.aktif');

// Route view Kurir For function job_orderan_selesai_kurir
Route::get('/dashboard/job/selesai', [UserController::class, 'job_orderan_selesai_kurir'])->middleware('auth')->name('job.selesai');

// Route Post Kurir For function order_working_fwd
Route::post('/dashboard/job', [UserController::class, 'order_working_fwd'])->middleware('auth')->name('job.run');

// Route Post Kurir For function order_working_done
Route::post('/dashboard/job/aktif', [UserController::class, 'order_working_done'])->middleware('auth')->name('job.run.done');

// Route CronJob
Route::get('/runtask', [MainController::class, 'run']);

Route::get('/search', [MainController::class, 'search'])->name('products.search');


// Comment and like
Route::post('/produk/{id}/likepro', [MainController::class, 'likeProduk'])->name('produk.likepro');
Route::post('/produk/comment/{id}/like', [MainController::class, 'likecomment'])->name('produk.comment.like');

Route::post('/produk/{id}/comment', [MainController::class, 'commentProduk'])->name('produk.comment');
Route::post('/comment/{id}/reply', [MainController::class, 'replyComment'])->name('comment.reply');
Route::put('/comment/{id}/edit', [MainController::class, 'editComment'])->name('comment.edit');
Route::delete('/comment/{id}/delete', [MainController::class, 'deleteComment'])->name('comment.delete');

//load product home
Route::get('/load-more-products', [MainController::class, 'loadMoreProducts'])->name('load.more.products');


Route::get('/load-more-products2', [MainController::class, 'loadMoreProducts2'])->name('load.more.products2');



// Route Error
Route::fallback(function(){
    return view('eror.404');
});
