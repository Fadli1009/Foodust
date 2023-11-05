<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DataUser;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function user(Request $request)
    {
        $makanan = Barang::all();
        $kategori = Kategori::all();
        return view('user.index', compact('kategori', 'makanan'));
    }
    public function report()
    {
        $users = DataUser::all();
        return view('admin.reporting', compact(['users']));
    }

}