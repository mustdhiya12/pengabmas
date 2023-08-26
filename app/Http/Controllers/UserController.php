<?php

namespace App\Http\Controllers;
use DB;
use App\Models\User;
use App\Models\Profile;
use App\Models\Produk;
use App\Models\pesanan_users;
use App\Models\transaksi_users;
use App\Models\transaksi_manuals;
use App\Models\notices;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{


// View Sign in Page
public function sign_in(){
       return view('user.sign_in');
}

// View Sign Up Page
public function sign_up(){
       return view('user.sign_up');
}

// View Users(penjual,kurir,pembeli and admin)
public function dashboard(){
       return view('user.dashboard');
}

// View Poin Page for User 'Pembeli' & 'Penjual'
public function poin(){
  if(Auth::user()->user_type == 'Pembeli'){
       return view('user.pembeli.poin');
  }elseif(Auth::user()->user_type == 'Penjual'){
    return view('user.pembeli.poin');
  }else{
    return view('eror.404');
  }
}



// View Add Product For Penjual
public function tambah(){
    if(Auth::user()->user_type == 'Penjual'){
       return view('user.tambah');
   }else{
       return view('eror.404');
    }
}


// View Peninjauan For Penjual
public function peninjauan(){
    $peninjauan = pesanan_users::all()->where('produk_owner_id', Auth::user()->id)->where('status_pesanan',   
'belum_ditinjau');


    $pengembalian_belum_ditinjau_view = notices::all();
    $pengembalian_belum_ditinjau = pesanan_users::all()->where('produk_owner_id', Auth::user()->id)->where('status_pesanan', 'pengembalian_belum_ditinjau');
    if(Auth::user()->user_type == 'Penjual'){
        return view('user.konfirmasi', compact('peninjauan', 'pengembalian_belum_ditinjau', 'pengembalian_belum_ditinjau_view'));
   }else{
       return view('eror.404');
    }
}

// View Notices Pages For 'Pembeli', 'Penjual' and 'Admin'
public function notices(){
    $notices = notices::all()->where('send_to_id', Auth::user()->id);

    if(Auth::user()->user_type == 'Pembeli' || Auth::user()->user_type == 'Admin' || Auth::user()->user_type == 'Penjual'){
        return view('user.notices', compact('notices'));
   }else{
       return view('eror.404');
    }
}

// FetchAll And View Users For Admin 
public function kelola_users(){
    if(Auth::user()->user_type == 'Admin'){
        $tdr = User::all();
       return view('user.admin.edit_users', compact('tdr'));
   }else{
       return view('eror.404');
    }
}


// send saldo view for 'Admin'
public function kirim_saldo_view(){
    if(Auth::user()->user_type == 'Admin'){
        $tdr_saldo_helper = transaksi_manuals::all()->where('status', 'di_query');
#        $tdr_saldo = DB::table('users')
#                ->join('transaksi_manuals as u', 'users.id', '=', 'u.user_id')
#                ->where('u.status', '=', 'di_query')
#                ->get();
       return view('user.admin.kirim_saldo_view', compact('tdr_saldo_helper'));
   }else{
       return view('eror.404');
    }
}


// run send saldo function for 'Admin'
public function doners_kirim_saldo(Request $request)
{

    $validated = $request->validate([
        'user_id' => 'required',
        'name_real' => 'required',
        'jumlah_saldo' => 'required',
        'order_id' => 'required',
    ]);
    $doner_reqs_usr_change = User::where('id', $request->user_id )->first();
    $doner_reqs_usr_change->increment('saldo', $request->jumlah_saldo);
    $doner_reqs_usr_change->save();
    if($doner_reqs_usr_change){
        $doner_reqs_req_change = transaksi_manuals::where('order_id', $request->order_id)->where('user_id', $request->user_id)->where('name_real', $request->name_real)->where('status', 'di_query')->first();
        $doner_reqs_req_change->status = 'selesai';
        $doner_reqs_req_change->save();
        if($doner_reqs_req_change){

            notices::create([
                'send_to_id' => $request->user_id,
                'send_to_name' => $request->name_real,
                'send_by_name' => Auth::user()->name,
                'send_by_id' => Auth::user()->id,
                'message' => 'Rp' . $request->jumlah_saldo . 'saldo sudah ditambahkan ke akun anda oleh admin. order id:' . $request->order_id,
                // add fields to be inserted into the table
            ]);

            return redirect()->back()->with('success', 'query selesai');

        }
    }

}

// Komplain Run function for Pembeli
public function komplain(Request $request)
{

    $validated = $request->validate([
        'u_id' => 'required',
        'name' => 'required',
        'komplain' => 'required',
        'order_id' => 'required',
        'produk_id' => 'required',
        'kurir_pengirim' => 'required',
        'owner_id' => 'required',
        'owner_name' => 'required',
    ]);

notices::create([
                'send_to_id' => $request->owner_id,
                'send_to_name' => $request->owner_name,
                'send_by_name' => $request->name,
                'send_by_id' => $request->u_id,
                'message' => 'komplain pembeli:' . $request->komplain . ' order id:' . $request->order_id . ' produk id:' . $request->produk_id . $request->order_id  . ' kurir pengirim:' . $request->kurir_pengirim,
            ]);

$updater_marah = pesanan_users::where('id_pesanan', $request->order_id)->where('produk_buyer_id', $request->u_id)->first();
$updater_marah->status_pesanan = 'di_komplain';
$updater_marah->save();

return redirect()->back();


}    

// Run function pengembalian For Pembeli
// public function pengembalian(Request $request)
// {

//     $validated = $request->validate([
//         'u_id' => 'required',
//         'name' => 'required',
//         'order_id' => 'required',
//         'produk_id' => 'required',
//         'kurir_pengirim' => 'required',
//         'owner_id' => 'required',
//         'owner_name' => 'required',
//         'penjelasan' => 'required',
//         'gambarrrrrr.*' => 'image|mimes:jpeg,png,jpg|max:2000',
//         'info_helper' => 'required',
//     ]);


//     $gambarrrrrr=array();
//     if($files=$request->file('gambarrrrrr')){
//         foreach($files as $file){
//             $name=$file->getClientOriginalName();
//             $file->move('gambarrrrrr',$name);
//             $gambarrrrrr[]=$name;
//         }
//     }

//     $helper=array();
//     if($aewtwet=$request->info_helper){
//         foreach($aewtwet as $down_helper){
//             $helper[]=$down_helper; 
//         }
//     }
//     $helper[] = $request->penjelasan;

// notices::create([
//                 'send_to_id' => $request->owner_id,
//                 'send_to_name' => $request->owner_name,
//                 'send_by_name' => $request->name,
//                 'send_by_id' => $request->u_id,
//                 'message' => 'alasan pembeli:' . $request->penjelasan . '. order id:' . $request->order_id . '. produk id:' . $request->produk_id  . '. kurir pengirim:' . $request->kurir_pengirim,
//                 'img' => implode("|",$gambarrrrrr),
//                 'info_helper' => implode("|",$helper)
//             ]);

//     $t_lol = pesanan_users::where('id_pesanan', $request->order_id )->where('produk_owner_id', $request->owner_id)->where('produk_id', $request->produk_id)->first();
//     $t_lol->status_pesanan = 'pengembalian_belum_ditinjau';
//     $t_lol->save();

// return redirect()->back();


// }  


// View Poin Page For 'Penjual' & 'Pembeli'
public function poin_manual(){
    if(Auth::user()->user_type == 'Pembeli'){
       return view('user.pembeli.manual');
   }elseif(Auth::user()->user_type == 'Penjual'){
    return view('user.pembeli.manual');
    }else{
        return view('eror.404');
    }
}

// Run poin function for 'Penjual' & 'Pembeli'
public function poin_manual_add(Request $request)
{
    $validated = $request->validate([
        'nama_real' => 'required',
        'no_hp' => 'required',
        'jumlah_saldo' => 'required',
        'order_id' => 'required',
        'user_id' => 'required',
        'user_nama_acc' => 'required',
        'status' => 'required',
    ]);
    $manuals = transaksi_manuals::where('user_id', $request->user_id)->where('status', 'di_query')->first();
    if($manuals === NULL){
    transaksi_manuals::create([
        'name_real' => $validated['nama_real'],
        'no_hp' => $validated['no_hp'],
        'request_saldo' => $validated['jumlah_saldo'],
        'order_id' => $validated['order_id'],
        'user_id' => $validated['user_id'],
        'name_acc' => $validated['user_nama_acc'],
        'status' => $validated['status'],
        // add fields to be inserted into the table
    ]);
    return redirect()->route('poin.manual')->with('success', 'Request Dikirim');
    }else{
    return redirect()->route('poin.manual')->with('success', 'Anda memiliki tranksaksi yang belum selesai');
    }

    
}


// transaksi View For 'Admin'
public function transaksi_main_admin_kelola(){
    $daftar_manual_adm = transaksi_manuals::all();
    if(Auth::user()->user_type == 'Admin'){
    return view('user.admin.transaksi', compact('daftar_manual_adm'));
    }else{
       return view('eror.404');
    }
}


// Run peninjauan konfirmasi For 'Penjual'
public function peninjauan_run(Request $request){
    $validated = $request->validate([
        'id_pembeli' => 'required',
        'id_pesanan' => 'required',
        'status' => 'required',
        'id_produk'=> 'required',
        // add validation rules for your field
    ]);
    if(Auth::user()->user_type == 'Penjual'){
$mang = pesanan_users::where('id_pesanan', $request->id_pesanan)->where('produk_buyer_id', $request->id_pembeli)->first();
$mang_seller = Produk::where('produk_id', $request->id_produk)->where('produk_owner_id', Auth::user()->id)->first();
$mang->status_pesanan = $request->status;
$mang->save();

   }else{
       return view('eror.404');
    }
    return redirect()->back();
}

// run function peninjauan pengembalian for 'Admin'
public function peninjauan_pengembalian(Request $request){
    $validated = $request->validate([
        'id_pembeli' => 'required',
        'id_pesanan' => 'required',
        'status' => 'required',
        'id_produk'=> 'required',
        'price' => 'required',
        // add validation rules for your field
    ]);
    if(Auth::user()->user_type == 'Penjual'){

// if approved by 'Penjual'
if($request->status == 'pengembalian_di_approve_penjual'){

    $mang = pesanan_users::where('id_pesanan', $request->id_pesanan)->where('produk_buyer_id', $request->id_pembeli)->first();
$mang_seller = Produk::where('produk_id', $request->id_produk)->where('produk_owner_id', Auth::user()->id)->first();
$mang->status_pesanan = $request->status;
$mang->save();
if($mang->save()){
    $saiders = User::where('id', Auth::user()->id)->first();
    $saiders->decrement('saldo', $request->price * $request->item_quantity);
    $saiders->save();
    if($saiders->save()){
       $saiders_bottom = User::where('id', $request->id_pembeli)->first();
       $saiders_bottom->increment('saldo', $request->price * $request->item_quantity);
       $saiders_bottom->save();
       if($saiders_bottom->save()){
        $sr = Produk::where('produk_owner_id', Auth::user()->id)->where('produk_id', $request->id_produk)->first();
        $sr->increment('kuantitas', $request->item_quantity);
        $sr->save(); 
       }
    }
}
// if rejected by 'Penjual'
}elseif($request->status == 'pengembalian_di_tolak_penjual'){
    $mang = pesanan_users::where('id_pesanan', $request->id_pesanan)->where('produk_buyer_id', $request->id_pembeli)->first();
$mang_seller = Produk::where('produk_id', $request->id_produk)->where('produk_owner_id', Auth::user()->id)->first();
$mang->status_pesanan = $request->status;
$mang->save();
}
}else{
       return view('eror.404');
    }
    return redirect()->back();
}

// run function to add new produk for Penjual
public function tambah_produk(Request $request)
{    
    $validated = $request->validate([
        'produk_id' => 'required',
        'judul' => 'required',
        'deskripsi' => 'required',
        'min_harga' => 'required',
        'max_harga' => 'required',
        'produk_owner_id' => 'required',
        'produk_owner_nama' => 'required',
        'gambar.*' => 'image|mimes:jpeg,png,jpg|max:2000',
        'kantitas' => 'required',
        'link.*' => 'url',
        // add validation rules for your field
        ]);


    $images=array();
    if($files=$request->file('gambar')){
        foreach($files as $file){
            $name=$file->getClientOriginalName();
            $file->move('gambar',$name);
            $images[]=$name;
        }
    }
    $links = $request->input('link');
    $linkString = implode("|", $links);
    
    Produk::create([
        'produk_id' => $validated['produk_id'],
        'produk_name' => $validated['judul'],
        'produk_deskripsi' => $validated['deskripsi'],
        'min_price' => $validated['min_harga'],
        'max_price' => $validated['max_harga'],
        'produk_owner_id' => $validated['produk_owner_id'],
        'produk_owner_nama' => $validated['produk_owner_nama'],
        'gambar' => implode("|",$images),
        'kuantitas' => $validated['kantitas'],
        'link' => $linkString,
        // add fields to be inserted into the table
    ]);

    return redirect()->route('user.tambah')->with('success', 'Produk Berhasil DiTambahkan');
}



// Get 'Penjual' Produk data to edited By 'Penjual' Owner
public function get_data_produk()
{
    $users = Produk::all()->where('produk_owner_id', Auth::user()->id);
    if(Auth::user()->user_type == 'Penjual'){
    return view('user.view_edit', compact('users'));
    }else{
        return view('eror.404');
    }
}

// Get 'Penjual' Produk data to edited By 'Admin'
public function get_data_produk_adm()
{
    $users = Produk::all();
    if(Auth::user()->user_type == 'Admin'){
    return view('user.admin.edit_produk_penjual_view', compact('users'));
    }else{
        return view('eror.404');
    }
}


// run function edit 'Penjual' Produk for 'Penjual' Owner
public function ubah($id)
{
    $polpot = Produk::where('id', $id)->where('produk_owner_id', Auth::user()->id)->first();
    if(empty($polpot->id)){
    return view('eror.404');
    }elseif(isset($polpot->id)) {
        if(Auth::user()->user_type == 'Penjual'){
    return view('user.ubah', compact('polpot'));
    }else{
      return view('eror.404');  
    }
    }


}
// View edit 'Penjual' Produk for 'Admin'
public function ubah_adm($id)
{

    #$polpot = Produk::findorfail($id);
    $polpot = Produk::where('id', $id)->first();
    if(empty($polpot->id)){
    return view('eror.404');
    }elseif(isset($polpot->id)) {
        if(Auth::user()->user_type == 'Admin'){
    return view('user.admin.edit_produk_penjual', compact('polpot'));
    }else{
      return view('eror.404');  
    }
    }


}

// View edit Users for 'Admin'
public function kelola_users_edit($id)
{
    #$polpot = Produk::findorfail($id);
    $polpot = User::where('id', $id)->first();
    if(empty($polpot->id)){
    return view('eror.404');
    }elseif(isset($polpot->id)) {
        if(Auth::user()->user_type == 'Admin'){
    return view('user.admin.edit_users_bottom', compact('polpot'));
    }else{
      return view('eror.404');  
    }
    }
}

// run function edit Users Produk for 'Admin'
public function kelola_users_edit_run(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required',
        'email' => 'required',
        'password' => 'required',
        'tipe_user' => 'required',
        'alamat' => 'nullable',
        'no_hp' => 'nullable',
        'id_user' => 'required',
    ]);
    $ubah_user_kelola = User::where('id', $request->id_user )->first();
    $ubah_user_kelola->name = $request->nama;
    $ubah_user_kelola->email = $request->email;
    $ubah_user_kelola->password = Hash::make($request->password);
    $ubah_user_kelola->user_type = $request->tipe_user;
    $ubah_user_kelola->alamat = $request->alamat;
    $ubah_user_kelola->no_hp = $request->no_hp;
    $ubah_user_kelola->save();
    return redirect()->back()->with('success', 'Berhasil Diubah');

}

// Run function to edit 'Penjual' produk for 'Penjual' Owner
public function rus(Request $request, $id)
{
    try {
        $polpot_change_main = Produk::findOrFail($id);

        // Menghapus gambar-gambar yang akan dihapus
        $imagesToRemove = $request->input('images_to_remove', []);
        foreach ($imagesToRemove as $imageName) {
            $imagePath = public_path('gambar/' . $imageName);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Hapus gambar dari array gambar pada model
            $polpot_change_main->removeGambar($imageName);
        }

        // Menggabungkan gambar-gambar yang sudah ada dengan gambar-gambar baru
        $mergedImages = $polpot_change_main->gambarArray(); // Inisialisasi dengan gambar yang sudah ada
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $name = $file->getClientOriginalName();
                $file->move('gambar/', $name);
                $mergedImages[] = $name; // Tambahkan gambar baru ke dalam array mergedImages
            }
        }

        // Update informasi produk lainnya
        $polpot_change_main->produk_name = $request->judul;
        $polpot_change_main->produk_deskripsi = $request->deskripsi;
        $polpot_change_main->min_price = $request->min_harga;
        $polpot_change_main->max_price = $request->max_harga;
        $polpot_change_main->kuantitas = $request->kantitas;

        if ($request->has('link')) {
            $newLinks = $request->input('link');
            $linkString = implode("|", $newLinks);
            $polpot_change_main->link = $linkString;
        }
        
        
        

        $polpot_change_main->gambar = implode('|', $mergedImages);

        $polpot_change_main->save();

        return redirect()->route('user.ubah', $polpot_change_main->id)
            ->with([
                'polpot' => $polpot_change_main,
            ])->with('success', 'Produk Berhasil Diubah');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan saat mengubah produk.');
    }
}


// Run function to edit 'Penjual' produk for 'Admin'
public function rus_adm(Request $request)
{
    $polpot_change_main = Produk::findorfail($request->id);

    $images=array();
    if ($request->hasFile('gambar')) {
    if($files=$request->file('gambar')){
        foreach($files as $file){
            $name=$file->getClientOriginalName();
            $file->move('gambar',$name);
            $images[]=$name;
        }
    }

    $polpot_change_main->produk_name = $request->judul;
    $polpot_change_main->produk_deskripsi = $request->deskripsi;
    $polpot_change_main->gambar = implode("|",$images);
    $polpot_change_main->min_price = $request->min_harga;
    $polpot_change_main->max_price = $request->max_harga;
    $polpot_change_main->kuantitas = $request->kantitas;

    $polpot_change_main->save();

}else{
    $polpot_change_main->produk_name = $request->judul;
    $polpot_change_main->produk_deskripsi = $request->deskripsi;
    $polpot_change_main->min_price = $request->min_harga;
    $polpot_change_main->max_price = $request->max_harga;
    $polpot_change_main->kuantitas = $request->kantitas;

    $polpot_change_main->save();
}

    return redirect()->back()->with('success', 'Produk Berhasil Di Ubah');
}

// Run function to Delete 'Penjual' produk for 'Penjual' Owner
public function hapus_produk_aksi($id)
{
    $user = Produk::where('id', $id)->where('produk_owner_id', Auth::user()->id)->first();
    $user->delete();

    return redirect()->back()->with('success', 'Produk Berhasil Di Hapus');
}
// Run function to Delete 'Penjual' produk for 'Admin'
public function hapus_produk_aksi_admin($id)
{
    $user = Produk::where('id', $id)->first();
    $user->delete();

    return redirect()->back()->with('success', 'Produk Berhasil Di Hapus');
}


// run function Sign Up for Users(Penjual,Pembeli, and Kurir)
public function sign_up_action(Request $request)
{
    $this->validate($request, [
        'username' => 'required|max:255|unique:users',
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users|max:255',
        'password' => 'required',
        'password_confirmation' => 'required|same:password',
        'user_type' => 'required|in:Penjual,Pembeli', // Memastikan hanya Penjual atau Pembeli
        'link.*' => 'url',
    ]);

    $links = $request->input('link');
    $linkString = implode("|", $links);

    $api_key = bin2hex(random_bytes(32));

    $user = new User();
    $user->username = $request->input('username');
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = Hash::make($request->input('password'));
    $user->user_type = $request->input('user_type'); // Menggunakan nilai langsung dari radio button
    $user->api_key = $api_key;
    $user->link = $linkString;

    $user->save();

    return redirect()->route('user.sign_in')->with('success', 'You have successfully registered!');
}


// run function Sign In for Users(Penjual,Pembeli, and Kurir)
public function sign_in_action(Request $request)
    {
        $request->validate([
            'identifier' => 'required', 
            'password' => 'required',
        ]);
        
        $credentials = [
            'password' => $request->password,
        ];
        
        // Cek apakah input adalah alamat email
        if (filter_var($request->identifier, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $request->identifier;
        } else {
            $credentials['username'] = $request->identifier;
        }
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        
        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
        
    }

public function login_api(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $credentials['username'])->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        if (!Hash::check($credentials['password'], $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        return response()->json(['api_key' => $user->api_key], 200);
    }
public function tambah_produk_api(Request $request)
    {
        
        // Validate the API key
        $user = null;
        if ($request->header('API-Key')) {
            $user = User::where('api_key', $request->header('API-Key'))->where('username', $request->header('username'))->first();
        }
        if (!$user) {
            return response()->json(['error' => 'Invalid API key'], 401);
        }

        $validated = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'min_harga' => 'required',
            'max_harga' => 'required',
            'gambar.*' => 'image|mimes:jpeg,png,jpg|max:2000',
            'kantitas' => 'required',
            // add validation rules for your fields
        ]);

        $images = [];
        if ($files = $request->file('gambar')) {
            foreach ($files as $file) {
                $name = time() . '_' . $file->getClientOriginalName();
                $file->move('gambar', $name);
                $images[] = $name;
            }
        }
        $randomWord1 = rand(1000, 9999);

    $insertedData = Produk::create([
        'produk_id' => $randomWord1,
        'produk_name' => $validated['judul'],
        'produk_deskripsi' => $validated['deskripsi'],
        'min_price' => $validated['min_harga'],
        'max_price' => $validated['max_harga'],
        'produk_owner_id' => $user->id,
        'produk_owner_nama' => $user->name,
        'gambar' => implode("|",$images),
        'kuantitas' => $validated['kantitas'],
        // add fields to be inserted into the table
    ]);

        return response()->json($insertedData, 201);



    }

    
    public function update_api_admin(Request $request)
    {
        $user = null;
        if ($request->header('api_key') ) {
            $user = User::where('api_key', $request->header('api_key'))->where('username', $request->header('username') )->first();
        }
        if (!$user) {
            return response()->json(['error' => 'Invalid API key'], 401);
        }
        if($user->user_type == 'Admin'){
        $id = $request->header('produk_id');
        $a43636236 = Produk::where('produk_id', $id)->first();
        if (!$a43636236) {
            return response()->json(['error' => 'Record not found'], 404);
        }
        if (!$a43636236) {
            $linkArray = explode(',', $id);
            $a43636236->link = implode('|', $linkArray);
        }
        
    $a43636236->produk_name = $request->header('judul');
    $a43636236->produk_deskripsi = $request->header('deskripsi');
    $a43636236->min_price = $request->header('min_harga');
    $a43636236->max_price = $request->header('max_harga');
    $a43636236->kuantitas = $request->header('kantitas');
    $a43636236->link= $request->header('link');
    

    $a43636236->save();

        return response()->json($a43636236, 201);
    }else{
     return response()->json(['error' => 'not admin'], 401);
    }
    }

    public function peninjauan_run_api(Request $request){

    $user = null;
        if ($request->header('api_key') ) {
            $user = User::where('api_key', $request->header('api_key'))->where('username', $request->header('username') )->first();
        }
        if (!$user) {
            return response()->json(['error' => 'Invalid API key'], 401);
        }

    if($user->user_type == 'Penjual'){
$mang = pesanan_users::where('id_pesanan', $request->header('id_pesanan'))->first();
$mang_seller = Produk::where('produk_id', $request->header('id_produk'))->where('produk_owner_id', $user->id)->first();
if($mang->status_pesanan == 'belum_ditinjau'){
$mang->status_pesanan = 'di_konfirmasi';
$mang->save();
}else{
    return response()->json(['error' => 'sudah_di_tinjau'], 401);
}
return response()->json($mang, 201);

   }else{
       return view('eror.404');
    }
}



public function updateAccount(Request $request)
    {
        $user = Auth::user();

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'username' => 'nullable|max:255|unique:users,username,' . $user->id,
                'name' => 'required|max:255',
                'email' => 'nullable|email|unique:users,email,' . $user->id,
                'password' => 'nullable|min:6|confirmed',
                'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'status' => 'nullable|string',
                'link.*' => 'nullable|url',
            ]);

            $user->username = $request->input('username');
            $user->name = $request->input('name');
            $user->email = $request->input('email');

            if ($request->has('password')) {
                $user->password = Hash::make($request->input('password'));
            }
            
            if ($request->hasFile('profile_picture')) {
                $profilePicture = $request->file('profile_picture');
                $picturePath = $profilePicture->store('', 'public_profile_pictures');
                
                // Delete old profile picture if exists
                if ($user->profile_picture) {
                    Storage::disk('public_profile_pictures')->delete($user->profile_picture);
                }
                
                $user->profile_picture = $picturePath;
            }
            
            $user->status = $request->input('status');

            if ($request->has('link')) {
                $links = array_filter($request->input('link')); // Remove empty links
                $user->link = implode("|", $links);
            } else {
                $user->link = null;
            }

            $user->save();

            return back()->with('success', 'Account updated successfully!');
        } else {
            return view('user.dashboard', compact('user'));
        }
    }





public function peninjauan_pengembalian_api(Request $request){
    $user = null;
        if ($request->header('api_key') ) {
            $user = User::where('api_key', $request->header('api_key'))->where('username', $request->header('username') )->first();
        }
        if (!$user) {
            return response()->json(['error' => 'Invalid API key'], 401);
        }
    if($user->user_type == 'Penjual'){
    $status_check = pesanan_users::where('id_pesanan', $request->header('id_pesanan'))->where('produk_buyer_name', $request->header('nama_pembeli'))->first();
        if($status_check->status_pesanan == 'pengembalian_belum_ditinjau'){
        
// if approved by 'Penjual'
    if($request->header('status') == 'approve'){

        $mang = pesanan_users::where('id_pesanan', $request->header('id_pesanan'))->where('produk_buyer_name', $request->header('nama_pembeli'))->first();
    $mang_seller = Produk::where('produk_id', $request->header('id_produk'))->where('produk_owner_id', $user->id)->first();
    $mang->status_pesanan = 'pengembalian_di_approve_penjual';
    $mang->save();
    if($mang->save()){
        $saiders = User::where('id', $user->id)->first();
        $saiders->decrement('saldo', $mang->harga_produk * $mang->kuantitas);
        $saiders->save();
        if($saiders->save()){
        $saiders_bottom = User::where('username', $request->header('nama_pembeli'))->first();
        $saiders_bottom->increment('saldo', $mang->harga_produk * $mang->kuantitas);
        $saiders_bottom->save();
        if($saiders_bottom->save()){
            $sr = Produk::where('produk_owner_id', $user->id)->where('produk_id', $request->header('id_produk'))->first();
            $sr->increment('kuantitas', $mang->kuantitas);
            $sr->save(); 
        }
        }
    }

    return response()->json($mang, 201);
    // if rejected by 'Penjual'
    }elseif($request->header('status') == 'reject'){
        $mang = pesanan_users::where('id_pesanan', $request->header('id_pesanan'))->where('produk_buyer_name', $request->header('nama_pembeli'))->first();
    $mang_seller = Produk::where('produk_id', $request->header('id_produk'))->where('produk_owner_id', $user->id)->first();
    $mang->status_pesanan = 'pengembalian_di_tolak_penjual';
    $mang->save();
    return response()->json($mang, 201);
    }

// return response()->json($mang, 201);


    }else{
    return response()->json(['error' => 'sudah_di_tinjau'], 401);
    }

    }else{
        return view('eror.404');
        }

    }


    public function hapus_produk_aksi_api(Request $request)
    {
        $user = null;
            if ($request->header('api_key') ) {
                $user = User::where('api_key', $request->header('api_key'))->where('username', $request->header('username') )->first();
            }
            if (!$user) {
                return response()->json(['error' => 'Invalid API key'], 401);
            }
        $id = $request->header('produk_id');
            $a43636236 = Produk::where('produk_id', $id)->where('produk_owner_id', $user->id)->first();
            if (!$a43636236) {
                return response()->json(['error' => 'Record not found'], 404);
            }

        $produk_hapus = Produk::where('produk_id', $request->header('produk_id'))->where('produk_owner_id', $user->id)->first();
        $produk_hapus->delete();

        return response()->json($produk_hapus, 201);

        
    }

public function hapus_produk_aksi_api_admin(Request $request)
{
    $user = null;
        if ($request->header('api_key') ) {
            $user = User::where('api_key', $request->header('api_key'))->where('username', $request->header('username') )->first();
        }
        if (!$user) {
            return response()->json(['error' => 'Invalid API key'], 401);
        }
        if($user->user_type == 'Admin'){
    $id = $request->header('produk_id');
        $a43636236 = Produk::where('produk_id', $id)->first();
        if (!$a43636236) {
            return response()->json(['error' => 'Record not found'], 404);
        }

    $produk_hapus = Produk::where('produk_id', $request->header('produk_id'))->first();
    $produk_hapus->delete();

    return response()->json($produk_hapus, 201);
}else{
return response()->json(['error' => 'not admin'], 401);
}

    
}

    public function get_penjual_produk(Request $request)
    {
        $user = null;
        if ($request->header('api_key') ) {
            $user = User::where('api_key', $request->header('api_key'))->where('username', $request->header('username') )->first();
        }
        if (!$user) {
            return response()->json(['error' => 'Invalid API key'], 401);
        }
        if($user->user_type == 'Penjual'){
        $data = Produk::all()->where('produk_owner_id', $user->id);

        return response()->json($data);
        }
    }

    public function get_penjual_pesanan(Request $request)
    {
        $user = null;
        if ($request->header('api_key') ) {
            $user = User::where('api_key', $request->header('api_key'))->where('username', $request->header('username') )->first();
        }
        if (!$user) {
            return response()->json(['error' => 'Invalid API key'], 401);
        }
        if($user->user_type == 'Penjual'){
        $data = pesanan_users::all()->where('produk_owner_id', $user->id);

        return response()->json($data);
        }
    }


    public function lihat_produk_api_pembeli(Request $request)
    {
        $user = null;
        if ($request->header('api_key') ) {
            $user = User::where('api_key', $request->header('api_key'))->where('username', $request->header('username') )->first();
        }
        if (!$user) {
            return response()->json(['error' => 'Invalid API key'], 401);
        }
        if($user->user_type == 'Pembeli'){
        $data = Produk::all();

        return response()->json($data);
        }
    }



    public function lihat_produk_api_admin(Request $request)
    {
        $user = null;
        if ($request->header('api_key') ) {
            $user = User::where('api_key', $request->header('api_key'))->where('username', $request->header('username') )->first();
        }
        if (!$user) {
            return response()->json(['error' => 'Invalid API key'], 401);
        }
        if($user->user_type == 'Admin'){
        $data = Produk::all();

        return response()->json($data);
        }else{
        return response()->json(['error' => 'not admin'], 401);
        }
    }

    public function lihat_produk_pesanan_api_pembeli(Request $request)
    {
        $user = null;
        if ($request->header('api_key') ) {
            $user = User::where('api_key', $request->header('api_key'))->where('username', $request->header('username') )->first();
        }
        if (!$user) {
            return response()->json(['error' => 'Invalid API key'], 401);
        }
        if($user->user_type == 'Pembeli'){
        $data = pesanan_users::all()->where('produk_buyer_id', $user->id);

        return response()->json($data);
        }
    }

public function masukkan_kedalam_keranjang_api(Request $request)
{

    $user = null;
        if ($request->header('api_key') ) {
            $user = User::where('api_key', $request->header('api_key'))->where('username', $request->header('username') )->first();
        }
        if (!$user) {
            return response()->json(['error' => 'Invalid API key'], 401);
        }

if($user->user_type == 'Pembeli'){
    $checker = pesanan_users::where('produk_id', $request->header('produk_id'))->where('produk_buyer_id', $user->id)->where('status_pesanan', '!=', 'sudah_dikirim')->where('status_pesanan', '!=', 'di_komplain')->where('status_pesanan', '!=', 'pengembalian_di_approve_penjual')->where('status_pesanan', '!=', 'pengembalian_di_tolak_penjual')->where('status_pesanan', '!=', 'pengembalian_belum_ditinjau')->where('status_pesanan', '!=', 'transaksi_batal')->first();


    $a34346 = Produk::where('produk_id', $request->header('produk_id'))->first();
    
    $validated = $request->validate([
        'produk_id' => 'required',
        'kuantitas' => 'required',
    ]);
    if ($checker === NULL) {
        if($request->header('kuantitas') <= $a34346->kuantitas){
        $add_check_picker = Produk::where('produk_id', $request->header('produk_id'))->first();
        $randomWord1 = rand(1000, 9999);
        $data = pesanan_users::create([
        'nama_produk_yang_dipesan' => $add_check_picker->produk_name,
        'produk_id' => $add_check_picker->produk_id,
        'harga_produk' => $add_check_picker->min_price,
        'produk_owner_id' => $add_check_picker->produk_owner_id,
        'produk_owner_name' => $add_check_picker->produk_owner_nama,
        'produk_buyer_id' => $user->id,
        'produk_buyer_name' => $user->username,
        'kuantitas' => $request->header('kuantitas'),
        'id_pesanan' => $randomWord1,
        'status_pesanan' => 'di_keranjang',
        'alamat' => $user->alamat,
        'no_hp' => $user->no_hp,
    ]);

    return response()->json($data);
    }elseif($request->header('kuantitas') >= $a34346->kuantitas){
    return response()->json(['error' => 'melebihi stok'], 401);
    }
     
}elseif($checker->status_pesanan == 'di_keranjang') {
    $id = $request->header('id_pesanan');
        $a43636236 = pesanan_users::where('id_pesanan', $id)->where('produk_owner_id', $user->id)->first();
        if (!$a43636236) {
            return response()->json(['error' => 'id pesanan invalid'], 404);
        }
    $mang = pesanan_users::where('produk_id', $checker->produk_id)->where('produk_buyer_id', $user->id)->where('id_pesanan', $request->header('id_pesanan'))->first();
    $mod_apk = Produk::where('produk_id', $request->header('produk_id'))->first();
    if($mang->kuantitas + $request->header('kuantitas') <= $mod_apk->kuantitas){
    $mang->increment('kuantitas', $request->header('kuantitas'));
    $mang->save();
    return response()->json($mang);
    }elseif($mang->kuantitas + $request->header('kuantitas') >= $mod_apk->kuantitas){
    return response()->json(['error' => 'melebihi stok'], 401);
    }
}

    }
}

public function penghapus_pesanan_api(Request $request)
{
    $user = null;
        if ($request->header('api_key') ) {
            $user = User::where('api_key', $request->header('api_key'))->where('username', $request->header('username') )->first();
        }
        if (!$user) {
            return response()->json(['error' => 'Invalid API key'], 401);
        }
        $id = $request->header('id_pesanan');
        $a43636236 = pesanan_users::where('id_pesanan', $id)->where('produk_buyer_id', $user->id)->first();
        if (!$a43636236) {
            return response()->json(['error' => 'Record not found'], 404);
        }

    $penghapus_pesanan = pesanan_users::where('id_pesanan', $request->header('id_pesanan'))->where('produk_buyer_id', $user->id)->where('status_pesanan', 'di_keranjang')->first();
    $penghapus_pesanan->delete();
    return response()->json($penghapus_pesanan);
}


public function lihat_peninjauan_api(Request $request){
    $user = null;
        if ($request->header('api_key') ) {
            $user = User::where('api_key', $request->header('api_key'))->where('username', $request->header('username') )->first();
        }
        if (!$user) {
            return response()->json(['error' => 'Invalid API key'], 401);
        }
        if($user->user_type == 'Penjual'){
    $peninjauan = pesanan_users::all()->where('produk_owner_id', $user->id)->where('status_pesanan',   
'belum_ditinjau');


    $pengembalian_belum_ditinjau_view = notices::all();
    $pengembalian_belum_ditinjau = pesanan_users::all()->where('produk_owner_id', $user->id)->where('status_pesanan', 'pengembalian_belum_ditinjau');
    if($user->user_type == 'Penjual'){
        return response()->json($peninjauan);
   }else{
       return view('eror.404');
    }
}else{

}
}

public function checkout_api(Request $request)
{

     $user = null;
        if ($request->header('api_key') ) {
            $user = User::where('api_key', $request->header('api_key'))->where('username', $request->header('username') )->first();
        }
        if (!$user) {
            return response()->json(['error' => 'Invalid API key'], 401);
        }
    $itemNames = 'belum_ditinjau';
    $checker_prc_top = pesanan_users::where('produk_id', $request->header('produk_id'))->where('id_pesanan', $request->header('id_pesanan'))->first();
    if($checker_prc_top->produk_buyer_id == $user->id){
    $checker_prc = Produk::where('produk_id', $request->header('produk_id'))->where('produk_owner_id', $checker_prc_top->produk_owner_id)->first();
    if($checker_prc_top->status_pesanan == 'di_keranjang'){
    $itemPrices = $checker_prc_top->kuantitas *  $checker_prc_top->harga_produk;
        if($user->saldo < $itemPrices){
        return response()->json(['error' => 'saldo kurang'], 401);
    }elseif($user->saldo >= $itemPrices){
        $item = pesanan_users::where('id_pesanan', $request->header('id_pesanan'))->first();
        $item->status_pesanan = $itemNames;
        $item->save();
        if($item->save()){
    $changer = User::where('id', $user->id)->first();
    $changer->decrement('saldo', $itemPrices);
    $changer->save();
    if($item->save()){
    $hasi_pointer = User::where('id', $checker_prc->produk_owner_id)->first();
    $hasi_pointer->increment('saldo', $itemPrices);
    $hasi_pointer->save();
    if($hasi_pointer->save()){
    $a235235235 = Produk::where('produk_id', $request->header('produk_id'))->where('produk_owner_id', $checker_prc_top->produk_owner_id)->first();
    $a235235235->decrement('kuantitas', $checker_prc_top->kuantitas);
    $a235235235->save();
    return response()->json(['success' => 'Berhasil checkout'], 201);
    }
    }
        }
       
    }
   }else{
   return response()->json(['error' => 'sudah checkout'], 401);
   }

   }else{
  return response()->json(['error' => 'pesanan salah'], 401);
}

}




public function pengaturan_user_api(Request $request)
{
    $user = null;
        if ($request->header('api_key') ) {
            $user = User::where('api_key', $request->header('api_key'))->where('username', $request->header('username') )->first();
        }
        if (!$user) {
            return response()->json(['error' => 'Invalid API key'], 401);
        }

    $validated = $request->validate([
        'alamat' => 'required',
        'no_hp' => 'required',
        // add validation rules for your field

    ]);
    $ubah_alamat = User::where('id', $user->id )->where('user_type', $user->user_type )->first();
    $ubah_alamat->alamat = $request->header('alamat');
    $ubah_alamat->no_hp = $request->header('no_hp');
    $ubah_alamat->save();
    return response()->json($ubah_alamat);

}

public function kirim_saldo_view_api(Request $request){
    $user = null;
        if ($request->header('api_key') ) {
            $user = User::where('api_key', $request->header('api_key'))->where('username', $request->header('username') )->first();
        }
        if (!$user) {
            return response()->json(['error' => 'Invalid API key'], 401);
        }
    if($user->user_type == 'Admin'){
        $tdr_saldo_helper = transaksi_manuals::all()->where('status', 'di_query');
#        $tdr_saldo = DB::table('users')
#                ->join('transaksi_manuals as u', 'users.id', '=', 'u.user_id')
#                ->where('u.status', '=', 'di_query')
#                ->get();
       return response()->json($tdr_saldo_helper);
   }else{
       return response()->json(['error' => 'not admin'], 401);
    }
}

public function doners_kirim_saldo_api(Request $request)
{

    $user = null;
        if ($request->header('api_key') ) {
            $user = User::where('api_key', $request->header('api_key'))->where('username', $request->header('username') )->first();
        }
        if (!$user) {
            return response()->json(['error' => 'Invalid API key'], 401);
        }
    if($user->user_type == 'Admin'){
    $doner_checks = transaksi_manuals::where('order_id', $request->header('order_id'))->where('user_id', $request->header('id_penerima'))->where('status', 'di_query')->first();

    $doner_reqs_usr_change = User::where('id', $request->header('id_penerima') )->first();
    $doner_reqs_usr_change->increment('saldo', $doner_checks->request_saldo);
    $doner_reqs_usr_change->save();
    if($doner_reqs_usr_change){
        $doner_reqs_req_change = transaksi_manuals::where('order_id', $doner_checks->order_id)->where('user_id', $doner_checks->user_id)->where('name_real', $doner_checks->name_real)->where('status', 'di_query')->first();
        $doner_reqs_req_change->status = 'selesai';
        $doner_reqs_req_change->save();
        if($doner_reqs_req_change){
            notices::create([
                'send_to_id' => $doner_checks->user_id,
                'send_to_name' => $doner_checks->name_real,
                'send_by_name' => $user->name,
                'send_by_id' => $user->id,
                'message' => 'Rp' . $doner_checks->request_saldo . 'saldo sudah ditambahkan ke akun anda oleh admin. order id:' . $doner_checks->order_id,
                // add fields to be inserted into the table
            ]);

            return response()->json($doner_reqs_req_change);

        }
    }
}else{
return response()->json(['error' => 'not admin'], 401);
}

}



// run function Logout for Users(Penjual,Pembeli,Kurir and Admin)
    public function logout(Request $request)
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->intended('/dashboard');
    }

// Run function insert produk to keranjang for 'Pembeli'
public function masukkan_kedalam_keranjang(Request $request)
{
    $validated = $request->validate([
        'produk_yang_ingin_di_pesan' => 'required',
        'produk_id' => 'required',
        'min_price' => 'required',
        'produk_owner_id' => 'required',
        'produk_owner_name' => 'required',
        'produk_buyer_id' => 'required',
        'produk_buyer_name' => 'required',
        'id_pesanan' => 'required',
        'kuantitas' => 'required',
        'status_pesanan' => 'required',
        'alamat' => 'required',
        'no_hp' => 'required',
    ]);
    $checker = pesanan_users::where('produk_id', $request->produk_id)->where('produk_buyer_id', $request->produk_buyer_id)->where('status_pesanan', '!=', 'sudah_dikirim')->where('status_pesanan', '!=', 'di_komplain')->where('status_pesanan', '!=', 'pengembalian_di_approve_penjual')->where('status_pesanan', '!=', 'pengembalian_di_tolak_penjual')->where('status_pesanan', '!=', 'pengembalian_belum_ditinjau')->where('status_pesanan', '!=', 'transaksi_batal')->first();
    if ($checker === NULL) {
        pesanan_users::create([
        'nama_produk_yang_dipesan' => $validated['produk_yang_ingin_di_pesan'],
        'produk_id' => $validated['produk_id'],
        'harga_produk' => $validated['min_price'],
        'produk_owner_id' => $validated['produk_owner_id'],
        'produk_owner_name' => $validated['produk_owner_name'],
        'produk_buyer_id' => $validated['produk_buyer_id'],
        'produk_buyer_name' => $validated['produk_buyer_name'],
        'kuantitas' => $validated['kuantitas'],
        'id_pesanan' => $validated['id_pesanan'],
        'status_pesanan' => $validated['status_pesanan'],
        'alamat' => $validated['alamat'],
        'no_hp' => $validated['no_hp'],
    ]);
     
}elseif($checker->status_pesanan == 'di_keranjang') {
    $mang = pesanan_users::where('produk_id', $checker->produk_id)->where('produk_buyer_id', $request->produk_buyer_id)->where('id_pesanan', $checker->id_pesanan)->first();
    $mod_apk = Produk::where('produk_id', $request->produk_id)->first();
    if($mang->kuantitas + $request->kuantitas <= $mod_apk->kuantitas){
    $mang->increment('kuantitas', $request->kuantitas);
    $mang->save();
    }elseif($mang->kuantitas + $request->kuantitas >= $mod_apk->kuantitas){

    }
}

    return redirect()->back();
}

// run function status pengiriman for 'Kurir'
public function order_working_fwd(Request $request){


   $validated = $request->validate([
        'status_pengiriman' => 'required',
        'produk_id' => 'required',
        'produk_order_id' => 'required',
        'namaDanid_kurir' => 'required',
    ]);

    $mang = pesanan_users::where('produk_id', $request->produk_id)->where('id_pesanan', $request->produk_order_id)->first();
    $mang->status_pesanan = $request->status_pengiriman;
    $mang->kurir = $request->namaDanid_kurir;
    $mang->save();
   return redirect()->back();

}

// run function pengiriman selesai for 'Kurir'
public function order_working_done(Request $request){


   $validated = $request->validate([
        'status_pengiriman' => 'required',
        'produk_id' => 'required',
        'produk_order_id' => 'required',
        'namaDanid_kurir' => 'required',
    ]);

    $mang = pesanan_users::where('produk_id', $request->produk_id)->where('id_pesanan', $request->produk_order_id)->where('kurir', $request->namaDanid_kurir)->first();
    $mang->status_pesanan = $request->status_pengiriman;
    $mang->save();
   return redirect()->back();

}

// run function delete pesanan where is status still in karanjang for 'Penjual'
public function penghapus_pesanan($id)
{
    $penghapus_pesanan = pesanan_users::where('id_pesanan', $id)->where('produk_buyer_id', Auth::user()->id)->where('status_pesanan', 'di_keranjang')->first();
    $penghapus_pesanan->delete();
    return redirect()->back()->with('success', 'Produk Berhasil Di Hapus');
}

// run function to change pesanan status to belum di tinjau for 'Pembeli'
public function updateItems(Request $request)
{
    $itemIds = $request->id_pesanan_handler;
    $itemNames = $request->namer;
    $itemPrices = $request->selected_items;

    if (is_array($itemIds)) {
    if (count($itemIds) > 1){
    $saldo = Auth::user()->saldo;
    $itemPrice = $itemPrices;
      foreach ($itemIds as $key => $a35235) {
$checker_ses = Produk::where('produk_id', $request->produk_id[$key])->where('produk_owner_id', $request->itm_owner[$key])->first();
if($checker_ses->kuantitas >= 1){
    $comparison = bccomp($saldo, $itemPrice[$key]);
    if($comparison === -1){
        return redirect()->back()->with('success', 'saldo kurang');
    }elseif($comparison >= 0){
        $item = pesanan_users::where('id_pesanan', $a35235)->first();
        $item->status_pesanan = $itemNames[$key];
        $item->save();
        if($item->save()){
    $changer = User::where('id', $request->usr_id[$key])->first();
    $changer->decrement('saldo', $itemPrices[$key]);
    $changer->save();
    if($item->save()){
    $hasi_pointer = User::where('id', $request->itm_owner[$key])->first();
    $hasi_pointer->increment('saldo', $itemPrices[$key]);
    $hasi_pointer->save();
    if($hasi_pointer->save()){
    $a235235235 = Produk::where('produk_id', $request->produk_id[$key])->where('produk_owner_id', $request->itm_owner[$key])->first();
    $a235235235->decrement('kuantitas', $request->kuantitas[$key]);
    $a235235235->save();
    }
    }
        }
       
    }

}elseif($checker_ses->kuantitas < 1){
    return redirect()->back()->with('success', 'ERR_QUANTITAS_NULL');
}
}


    }elseif(count($itemIds) == 1) {

        $checker_ses = Produk::where('produk_id', $request->produk_id[0])->where('produk_owner_id', $request->itm_owner[0])->first();
if($checker_ses->kuantitas >= 1){
        if(Auth::user()->saldo < $itemPrices[0]){
        return redirect()->back()->with('success', 'saldo kurang');
    }elseif(Auth::user()->saldo >= $itemPrices[0]){
        $item = pesanan_users::where('id_pesanan', $itemIds[0])->first();
        $item->status_pesanan = $itemNames[0];
        $item->save();
        if($item->save()){
    $changer = User::where('id', $request->usr_id[0])->first();
    $changer->decrement('saldo', $itemPrices[0]);
    $changer->save();
    if($item->save()){
    $hasi_pointer = User::where('id', $request->itm_owner[0])->first();
    $hasi_pointer->increment('saldo', $itemPrices[0]);
    $hasi_pointer->save();
    if($hasi_pointer->save()){
    $a235235235 = Produk::where('produk_id', $request->produk_id[0])->where('produk_owner_id', $request->itm_owner[0])->first();
    $a235235235->decrement('kuantitas', $request->kuantitas[0]);
    $a235235235->save();
    }
    }
        }
       
    }

    }elseif($checker_ses->kuantitas < 1){
    return redirect()->back()->with('success', 'ERR_QUANTITAS_NULL');
}
        
        
    }


}


    return redirect()->back();

}

// run function pengaturan for 'Pembeli'
public function pengaturan_user(Request $request)
{

    $validated = $request->validate([
        'alamat' => 'required',
        'no_hp' => 'required',
        // add validation rules for your field

    ]);
    $ubah_alamat = User::where('id', Auth::user()->id )->where('user_type', Auth::user()->user_type )->first();
    $ubah_alamat->alamat = $request->alamat;
    $ubah_alamat->no_hp = $request->no_hp;
    $ubah_alamat->save();
    return redirect()->back()->with('success', 'Berhasil Ditambahkan/Diubah');

}




// Midtrans API to Add a table
public function poin_aktion(Request $request){
       $request->request->add(['status' => 'unpaid']);
       $order = transaksi_users::create($request->all());


       \Midtrans\Config::$serverKey = config('midtrans.server_key');
       // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
       \Midtrans\Config::$isProduction = false;
       // Set sanitization on (default)
       \Midtrans\Config::$isSanitized = true;
       // Set 3DS transaction for credit card to true
       \Midtrans\Config::$is3ds = true;

$params = array(
    'transaction_details' => array(
        'order_id' => $order->order_id,
        'gross_amount' => $order->price,
    ),
    'customer_details' => array(
        'name' => $request->name_buyer,
        'phone' => '08111222333',
    ),
);

$snapToken = \Midtrans\Snap::getSnapToken($params);
return view('user.pembeli.callback', compact('snapToken', 'order'));
}


// Midtrans Callback to Update And adding Saldo to 'Pembeli' & 'Penjual
public function poin_callback(Request $request){
    $serverKey = config('midtrans.server_key');
    $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
    if($hashed == $request->signature_key){
        if($request->transaction_status == "capture"){
            $order = transaksi_users::where('order_id', $request->order_id)->first();
            $order->status = 'paid';
            $order->save();
            if($order){
            echo $request->id_buyer;
            $a23235235 = User::where('id', $order->id_buyer)->first();
            $a23235235->increment('saldo', '20000');
            $a23235235->save();
        }

        }
    }
}


public function poin_done(){
    return view('user.pembeli.poin_done');
}

public function poin_cancel(){
    return view('user.pembeli.poin_cancel');
}

// View Job Orderan From 'Pembeli' To be Delivered To 'Pembeli' By 'Kurir'
public function job_orderan_kurir(){
    $order_jobs = pesanan_users::all()->where('status_pesanan', 'di_konfirmasi');
    if(Auth::user()->user_type == 'Kurir'){
       return view('user.kurir.job_orderan', compact('order_jobs'));
   }else{
       return view('eror.404');
    }
}

// View Active Job Orderan From 'Pembeli' To be Delivered To 'Pembeli' By 'Kurir'
public function job_orderan_aktif_kurir(){
    $order_jobs_aktive = pesanan_users::all()->where('status_pesanan', 'sedang_dikirim');
    if(Auth::user()->user_type == 'Kurir'){
       return view('user.kurir.job_aktif', compact('order_jobs_aktive'));
   }else{
       return view('eror.404');
    }
}

// View Job Orderan 'Kurir' That Been Delivered To 'Pembeli' By 'Kurir'
public function job_orderan_selesai_kurir(){
    $order_jobs_selesai = pesanan_users::all()->where('status_pesanan', 'sudah_dikirim')->where('kurir', Auth::user()->id . Auth::user()->username);
    if(Auth::user()->user_type == 'Kurir'){
       return view('user.kurir.job_orderan_selesai', compact('order_jobs_selesai'));
   }else{
       return view('eror.404');
    }
}

}