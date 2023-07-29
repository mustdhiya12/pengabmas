<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\likes_pro;
use App\Models\likes_com;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\User;
use App\Models\pesanan_users;
use App\Models\transaksi_manuals;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;
use App\TimeHelper;

class MainController extends Controller
{

    // Home Page
    public function home()
    {
        return view('main.home');
    }
    // pripacy policy
    public function pr()
    {
        return view('main.privacy');
    }

    public function formatReplyTime($time)
    {
        $currentTime = now();
        $diff = $currentTime->diff($time);
        $unit = '';

        if ($diff->y > 0) {
            $unit = $diff->y == 1 ? 'year' : 'years';
            return $diff->y . ' ' . $unit . ' ago';
        } elseif ($diff->m > 0) {
            $unit = $diff->m == 1 ? 'month' : 'months';
            return $diff->m . ' ' . $unit . ' ago';
        } elseif ($diff->d > 0) {
            $unit = $diff->d == 1 ? 'day' : 'days';
            return $diff->d . ' ' . $unit . ' ago';
        } elseif ($diff->h > 0) {
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

    // Produk View
    public function produk_view4234234($id)
    {
        $mainpolopot = Produk::where('id', $id)->first();
        $comments = Comment::with('user', 'replies')
            ->where('produk_id', $id)
            ->whereNull('comments_id')
            ->get();
        $commentsCount = $comments->count();
        $likesCountcom = null;
        $likesCountPro = 0;
        $not_in_chart = [];

        foreach ($comments as $comment) {
            $comment->formatted_time = \App\Helpers\TimeHelper::formatReplyTime($comment->created_at);

            foreach ($comment->replies as $reply) {
                $reply->formatted_time = \App\Helpers\TimeHelper::formatReplyTime($reply->created_at);
            }
        }

        if (auth()->check()) {
            $likesCountPro = likes_pro::where('produk_id', $id)->count();
        }

        foreach ($comments as $comment) {
            $commentLike = likes_com::where('comment_id', $comment->id)->first();

            if ($commentLike) {
                $likesCountcom = likes_com::where('comment_id', $comment->id)->count();
            } else {
                // Tangani ketika "like" pada komentar tidak ditemukan
                $likesCountcom = 0;
            }
        }

        if (isset(Auth::user()->id)) {
            $periksa_hitung = pesanan_users::where('produk_id', $mainpolopot->produk_id)
                ->where('produk_buyer_id', Auth::user()->id)
                ->distinct('id_pesanan')
                ->count();

            if ($periksa_hitung > 0) {
                $status_pesanan = [
                    'sudah_dikirim',
                    'transaksi_batal',
                    'pengembalian_belum_ditinjau',
                    'pengembalian_di_tolak_penjual',
                    'pengembalian_di_approve_penjual',
                    'di_komplain',
                    'di_keranjang',
                    'sedang_dikirim',
                    'di_konfirmasi',
                    'belum_ditinjau',
                ];

                foreach ($status_pesanan as $status) {
                    $not_in_chart[] = pesanan_users::distinct('id_pesanan')
                        ->where('status_pesanan', $status)
                        ->where('produk_id', $mainpolopot->produk_id)
                        ->where('produk_buyer_id', Auth::user()->id)
                        ->first();
                }
            }
        }

        // Menyimpan cookie
        $cookieName = 'my_cookie'; // Ganti dengan nama cookie yang Anda inginkan
        $cookieValue = Cookie::get($cookieName);
        if (!$cookieValue) {
            Cookie::queue($cookieName, 'value', 525600); // Waktu kedaluwarsa dalam menit (525600 menit = 1 tahun)
        }


        return view('main.produk', compact('comments', 'commentsCount', 'not_in_chart', 'likesCountPro', 'likesCountcom', 'mainpolopot'));
    }


    public function commentProduk(Request $request, $id)
    {
        $request->validate([
            'body' => 'required',
        ]);

        // Membuat komentar baru
        $comment = new Comment();
        $comment->users_id = auth()->user()->id;
        $comment->produk_id = $id;
        $comment->body = $request->input('body');
        $comment->save();

        return redirect()->route('main.apk', $comment->produk_id);
    }


    

    public $bodyt, $editComment_id, $comment_id;

    public function selectcomment($id)
    {
        $comment = Comment::find($id);
        $this->editComment_id = $comment -> id;
        $this->bodyt = $comment->body;
    }

    public function replyComment(Request $request, $id)
    {
        $request->validate([
            'bodyt' => 'required',
        ]);

        // Membuat reply komentar
        $reply = new Comment();
        $reply->users_id = auth()->user()->id;
        $reply->produk_id = $id;
        $reply->body = $request->input('bodyt');
        $reply->comments_id = $request->input('comments_id');
        $reply->save();

        return redirect()->route('main.apk', $reply->produk_id);
    }

    public function editComment(Request $request, $id)
    {
        $request->validate([
            'bodyt' => 'required',
        ]);

        $comment = Comment::find($id);

        if ($comment) {
            $comment->body = $request->input('bodyt');
            $comment->edited = true;
            $comment->save();

        } else {
            session()->flash('danger', "Komentar gagal diubah");
        }

        return redirect()->route('main.apk', $comment->produk_id);
    }


    public function deleteComment($id)
    {
        // Hapus komentar
        $comment = Comment::findOrFail($id);
        $produk_id = $comment->produk_id;
        $comment->delete();

        return redirect()->route('main.apk', $produk_id);
    }
    public function likeProduk(Request $request, $id)
    {
        // Mengecek apakah pengguna telah memberikan like sebelumnya
        $existingLike = likes_pro::where('users_id', auth()->user()->id)->where('produk_id', $id)->first();

        if ($existingLike) {
            // Jika pengguna telah memberikan like sebelumnya, hapus like
            $existingLike->delete();
        } else {
            // Jika pengguna belum memberikan like sebelumnya, tambahkan like baru
            $like = new likes_pro();
            $like->users_id = auth()->user()->id;
            $like->produk_id = $id;
            $like->save();
            return redirect()->route('main.apk', $like->produk_id);
        }
        return redirect()->route('main.apk', $existingLike->produk_id);
    }


    public function likecomment(Request $request, $id)
    {
        // Mengecek apakah pengguna telah memberikan like sebelumnya
        $existingLike = likes_com::where('users_id', auth()->user()->id)->where('comment_id', $id)->first();

        if ($existingLike) {
            // Jika pengguna telah memberikan like sebelumnya, hapus like
            $existingLike->delete();
        } else {
            // Jika pengguna belum memberikan like sebelumnya, tambahkan like baru
            $like = new likes_com();
            $like->users_id = auth()->user()->id;
            $like->comment_id = $id;
            $like->save();
        }

        $comment = Comment::where('id', $id)->first();
        return redirect()->route('main.apk', $comment->produk_id);
    }



    // view produk pembeli
    public function produk_buyer_view()
    {
        // view produk pesanan pembeli with status belum_ditinjau
        $produk_belum_ditinjau = pesanan_users::all()->where('produk_buyer_id', Auth::user()->id)->where('status_pesanan', 'belum_ditinjau')->where('kuantitas', '>', '0');

        // view produk pesanan pembeli with status di_keranjang
        $produk = pesanan_users::all()->where('produk_buyer_id', Auth::user()->id)->where('status_pesanan', 'di_keranjang');

        // view produk pesanan pembeli with status di_keranjang with variable to delete pesanan in keranjang
        $produk_deleter_helper = pesanan_users::all()->where('produk_buyer_id', Auth::user()->id)->where('status_pesanan', 'di_keranjang');
        // view produk pesanan pembeli with status di_keranjang helper
        $produk_checker_helper = Produk::all();

        // view produk pesanan pembeli with status di_konfirmasi
        $produk_sudah_ditinjau = pesanan_users::all()->where('produk_buyer_id', Auth::user()->id)->where('status_pesanan', 'di_konfirmasi');

        // view produk pesanan pembeli with status sedang_dikirim
        $produk_sedang_di_kirim = pesanan_users::all()->where('produk_buyer_id', Auth::user()->id)->where('status_pesanan', 'sedang_dikirim');

        // view produk pesanan pembeli with status sudah_dikirim
        $produk_sudah_di_kirim = pesanan_users::all()->where('produk_buyer_id', Auth::user()->id)->where('status_pesanan', 'sudah_dikirim');

        // view produk pesanan pembeli with status di_komplain
        $produk_di_komplain = pesanan_users::all()->where('produk_buyer_id', Auth::user()->id)->where('status_pesanan', 'di_komplain');

        // view produk pesanan pembeli with status pengembalian_belum_ditinjau
        $produk_req_pengembelian_active = pesanan_users::all()->where('produk_buyer_id', Auth::user()->id)->where('status_pesanan', 'pengembalian_belum_ditinjau');

        // view produk pesanan pembeli with status pengembalian_di_approve_penjual
        $pengembalian_di_approve_penjual = pesanan_users::all()->where('produk_buyer_id', Auth::user()->id)->where('status_pesanan', 'pengembalian_di_approve_penjual');

        // view produk pesanan pembeli with status pengembalian_di_tolak_penjual
        $pengembalian_di_tolak_penjual = pesanan_users::all()->where('produk_buyer_id', Auth::user()->id)->where('status_pesanan', 'pengembalian_di_tolak_penjual');

        // view produk pesanan pembeli with status transaksi_batal
        $transaksi_batal = pesanan_users::all()->where('produk_buyer_id', Auth::user()->id)->where('status_pesanan', 'transaksi_batal');

        // view function pesanan for 'Pembeli'
        if (Auth::user()->user_type == 'Pembeli') {
            return view('user.pembeli.pesanan', compact('produk', 'produk_belum_ditinjau', 'produk_sudah_ditinjau', 'produk_sedang_di_kirim', 'produk_sudah_di_kirim', 'produk_deleter_helper', 'produk_di_komplain', 'produk_req_pengembelian_active', 'pengembalian_di_approve_penjual', 'pengembalian_di_tolak_penjual', 'produk_checker_helper', 'transaksi_batal'));
        } else {
            abort(404);
        }
    }

    // Pengaturan View
    public function pengaturan()
    {
        return view('user.pembeli.pengaturan');
    }

    // Daftar Transaksi Pembeli
    public function daftar_transaksi_pembeli()
    {
        $daftar = pesanan_users::all()->where('produk_buyer_id', Auth::user()->id)->where('status_pesanan', 'sudah_dikirim');

        $daftar_manual = transaksi_manuals::all()->where('user_id', Auth::user()->id);
        if (Auth::user()->user_type == 'Pembeli') {
            return view('user.pembeli.daftar_transaksi', compact('daftar', 'daftar_manual'));
        } else {
            abort(404);
        }
    }
    public function get_data_produk_profile()
    {
        $users = Produk::all()->where('produk_owner_id', Auth::user()->id);
        if(Auth::user()->user_type == 'Penjual'){
            return view('user.dashboard', compact('users'));
        }else{
            return view('user.dashboard', compact('users'));
        }
    }
    // Fetch All Data To Main Page
    public function get_data_produk_main()
    {
        $products = Produk::paginate(8);
        return view('main.home', compact('products'));
    }
    public function get_data_produk_shop()
    {
        $products = Produk::paginate(8);
        return view('main.shop', compact('products'));
    }
    public function loadMoreProducts(Request $request)
    {
        $perPage = 8;
        $page = $request->input('page', 1);
        $products = Produk::paginate($perPage, ['*'], 'page', $page);

        $html = View::make('main.products_partial', compact('products'))->render();

        return response()->json([
            'html' => $html,
            'hasMore' => $products->hasMorePages()
        ]);
    }
    // Run CronJob For transaksi_batal
    public function run()
    {
        $format = 'Y-m-d H:i:s'; // format bisa di ganti atau di sesuaikan dengan time format di table

        $timezone = 'Asia/Singapore'; // timezone harus sama di setting dengan settingan timezone sql server dan cronjob

        $timeThreshold = Carbon::now($timezone)->subMinutes(5)->format($format);
        $rows = pesanan_users::where('status_pesanan', 'belum_ditinjau')->where('created_at', '<=', Carbon::createFromFormat($format, $timeThreshold, $timezone))->get();

        foreach ($rows as $row) {
            $row->status_pesanan = 'transaksi_batal';
            $row->save();
            if ($row->save()) {
                $d = User::where('id', $row->produk_owner_id)->first();
                $d->decrement('saldo', $row->harga_produk * $row->kuantitas);
                $d->save();
                if ($d->save()) {
                    $r = User::where('id', $row->produk_buyer_id)->first();
                    $r->increment('saldo', $row->harga_produk * $row->kuantitas);
                    $r->save();
                    if ($r->save()) {
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
            $products = $products->whereBetween('min_price', [$minPrice, $maxPrice]);
        }

        $products = $products->get();

        if ($products->isEmpty()) {
            return view('main.search')->with('message', 'No products found.');
        }

        return view('main.search', compact('products'));
    }
}
