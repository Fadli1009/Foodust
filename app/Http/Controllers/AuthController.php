<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
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
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);
        $val = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users','email')],
            'password' => ['required'],
            'con_password'=>['required']
        ],[
            'name.required'=>'Nama wajib diisi',
            'email.required'=>'Email wajib disi',
            'password.required'=>'password wajib diisi',
            'con_password.required'=>'Konfirmasi password wajib diisi'
        ]);    
        $val['password'] = bcrypt($request->password);        
        if($request['password'] === $request->input('con_password')){            
            User::create($val);
            return redirect('/index');
        }else{
            return redirect('/registrasi')->withErrors('Konfirmasi Password tidak sama');
        }       
        
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
