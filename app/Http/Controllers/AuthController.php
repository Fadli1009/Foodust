<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);
        $infologin = [
            'email' => $request->email,
            'password' => $request->password,

        ];
        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == "admin") {
                return redirect('/index');
            } else if (Auth::user()->role == "user") {
                return redirect('/user');
            }
        }
        return back()->withErrors('Username dan Password tidak ditemukan');
    }

    public function register()
    {
        return view('register');
    }
    public function regis(Request $request)
    {
        $val = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        $val['password'] = bcrypt($request->password);
        User::create($val);
        return redirect('/index');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate();
        return redirect('/');
    }
    public function menu()
    {
        $barang = Barang::paginate(6);
        return view('menu', compact('barang'));
    }
}
