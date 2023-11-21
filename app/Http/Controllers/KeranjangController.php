<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use PDF;
use App\Models\Barang;
use App\Models\DataUser;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class KeranjangController extends Controller
{
    function show(
        $id,
        Request $request
    ) {
        $data = Barang::find($id);
        return view('user.keranjang.addcart', compact(['data']));
    }
    function showFood()
    {
        $makanan = Barang::all();
        return view('user.index', compact(['makanan']));
    }
    public function create(Request $request)
    {
        if($request['stok']<$request['Total']){
            return redirect('/user')->withErrors('stok tidak cukup');
        }else{
            $val = $request->validate([
            'Nama' => ['required'],
            'Harga' => ['required'],
            'Jumlah' => ['required'],
            'Total' =>[ 'integer','required'],
            'stok'=>['required'],
            'id_user'=> ['required']
        ],[
            'Total.required'=>'klik tambah untuk mengisi form Total'
        ]);
            $barang = Barang::where('namaBarang',$request->input('Nama'))->first();
            $jumlah = $request->input('Total');
            $barang->stokBarang -= $jumlah;
            $barang->save();
            Keranjang::create($val);
            return redirect('/keranjang')->with('success', 'Berhasil ditambahkan ke keranjang');
        }
    }
    public function index()
    {
        $user = Auth::user();
        $data = Keranjang::where('id_user',$user->id)->get();
        $sum = Keranjang::where('id_user',$user->id)->sum('jumlah');
        $rupiah = number_format($sum, 0, ',', '.');
        return view('user.keranjang.index', compact(['data', 'rupiah']));
    }
    public function destroy($id)
    {
        $data = Keranjang::find($id);
        $data->delete();
        return redirect('/keranjang')->with('success', 'Berhasil menghapus data di keranjang');
    }
    public function checkout(Request $request)
    {
        $user = Auth::user();
        $data = Keranjang::where('id_user',$user->id)->get();
        $databarang = Barang::where('id_user',$user->id);
        $sum = Keranjang::where('id_user',$user->id)->sum('Jumlah');
        $rupiah = number_format($sum, 0, ',', '.');
        return view('user.keranjang.checkout', compact(['data', 'rupiah']));
    }
    public function verifyUser(Request $request)
    {
        $user = Auth::user();
        Session::flash('nama',$request->nama);
        Session::flash('telp',$request->telp);
        Session::flash('alamat',$request->alamat);
        Session::flash('total_pembayaran',$request->total_pembayaran);
        $val = $request->validate([
            'nama' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
            'total_pembayaran' => 'required'
        ],[
            'nama.required'=>'nama wajib diisi',
            'telp.required'=>'nomor hp wajib diisi',
            'alamat.required'=>'Alamat wajib diisi',
            'total_pembayaran.required'=>'Isi terlebih dahulu pembayarannya !'
        ]);
        $sum = Keranjang::where('id_user',$user->id)->sum('Jumlah');
        if($request['total_pembayaran'] < $sum){
            return back()->withErrors('Uang anda tidak cukup');
        }else{
            $user = Auth::user();
            $keranjang = Keranjang::where('id_user',$user->id)->first();
            $keranjang->total_pembayaran = $request['total_pembayaran'];
            $keranjang->save();
            $delete = Keranjang::where('id_user',$user->id);
            $delete->delete();
            DataUser::create($val);
            return redirect('/keranjang/checkout/thanks');
        }
    }
    public function thanks()
    {
        return view('user.thanks');
    }
    public function printpdf()
    {
        $user = Auth::user();
        $users = DB::table('data_users')->where('nama',$user->name);
        $sum = Keranjang::where('id_user',$user->id)->sum('Jumlah');
        $userbayar = Keranjang::where('id_user',$user->id)->first();
        $uanguser = Keranjang::where('id_user',$user->id)->first();
        $ttluang = $uanguser->Total_pembayaran;
        $kembalian = $userbayar->Total_pembayaran - $sum;
        $rupiah = number_format($sum, 0, ',', '.');
        $datakeranjang = Keranjang::where('id_user',$user->id)->get();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('user.print', compact(['datakeranjang', 'rupiah','kembalian','ttluang']));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('PDF Pemesanan Lyrafood.pdf');
    }
}
