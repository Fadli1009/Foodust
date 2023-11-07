<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use PDF;
use App\Models\Barang;
use App\Models\DataUser;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        ]);
        // dd($val);
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
        // $data = Keranjang::all();
        $sum = Keranjang::sum('Jumlah');
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
        $data = Keranjang::all();
        $databarang = Barang::all();
        $sum = Keranjang::sum('Jumlah');
        $rupiah = number_format($sum, 0, ',', '.');
        return view('user.keranjang.checkout', compact(['data', 'rupiah']));
    }
    public function verifyUser(Request $request)
    {
        $val = $request->validate([
            'nama' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
            'metodebayar' => 'required'
        ],[
            'nama.required'=>'nama wajib diisi',
            'telp.required'=>'nomor hp wajib diisi',
            'alamat.required'=>'Alamat wajib diisi',
            'metodebayar.required'=>'Isi terlebih dahulu pembayarannya !'
        ]);
        $sum = Keranjang::sum('Jumlah');
        if($request['metodebayar'] < $sum){
            return back()->withErrors('Uang anda tidak cukup');
        }else{
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
        $sum = Keranjang::sum('Jumlah');
        $rupiah = number_format($sum, 0, ',', '.');
        $user = DataUser::all();
        $datakeranjang = Keranjang::all();
        $pdf = PDF::loadView('user.print', compact(['datakeranjang', 'rupiah', 'user']));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('PDF Pemesanan Lyrafood.pdf');
    }
    public function hitung()
    {
        $data = Keranjang::count();
        return view('partials.header', compact(['data']));
    }
}
