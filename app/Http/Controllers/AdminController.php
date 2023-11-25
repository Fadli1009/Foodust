<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\DataUser;
use App\Models\Kategori;
use App\Models\Keranjang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class AdminController extends Controller
{
    public function index()
    {
        $ttldata = Barang::count();
        $datauser = DataUser::count();
        $ttlcategory = Kategori::count();
        $makanan = DB::table('barang')->paginate(4);
        $makananTable = Barang::with('category')->get();
        $kategori = Kategori::all();
        return view('admin.index', compact('ttldata', 'ttlcategory', 'makanan', 'kategori', 'makananTable', 'datauser'));
    }

    public function profile(){
        return view('user.profile');
    }
    public function createprofile(Request $request, User $user){
        $val = $request->validate([
            'name'=>'required',
            'email'=>'required|email'. $user->id,
            'password'=>'required'
        ]);
        $val['password'] = bcrypt($request->password);
        $user->update($val);
        return back()->with('success','Berhasil update data');
    }
    public function user(Request $request)
    {
        $makanan = Barang::all();
        $kategori = Kategori::all();
        return view('user.index', compact('kategori', 'makanan'));
    }
    public function report()
    {
        $users = DataUser::all();
        $count = DataUser::count();
        return view('admin.reporting', compact(['users','count']));
    }
    public function cari(Request $request){
        if($request->has('cari')){
            $makanan = Barang::where('namaBarang','like','%'.$request->cari.'%')->get();
        }else{
            $makanan = Barang::all();
        }
        return view('user.hasilcari',compact('makanan'));
    }
    public function forgotpassword(){
        return view('forogtpassword');
    }
    public function funcforgotpassword(Request $request){
        $request->validate([
            'email'=>'required|email'
        ],[
            'email.required'=>'Email wajib diisi'
        ]);
        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
    }
    public function resetPassword(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
     
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
     
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
    public function filter(Request $request){
        $start_date = $request->startFilter;
        $end_date = $request->endFilter;
        $users = DataUser::whereDate('created_at','>=',$start_date)->whereDate('created_at','<=',$end_date)->get();    
        return view('admin.reporting',compact('users'));
    }
    public function detail_user($id){
       $user = DataUser::find($id);
       $keranjang = Keranjang::where('id_user', $user->id_user)->get();
       $ttlharga = Keranjang::where('id_user', $user->id_user)->sum('Jumlah');
       $ttlbayar = Keranjang::where('id_user', $user->id_user)->get('Total_pembayaran')->first();
       $kembalian = $ttlbayar->Total_pembayaran - $ttlharga;
    //    dd($keranjang->first()->created_at);
       return view('admin.detailreport',compact('keranjang','user','ttlharga','ttlbayar','kembalian'));
    }
}
