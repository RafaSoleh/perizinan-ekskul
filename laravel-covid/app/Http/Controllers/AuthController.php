<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    function index()
    {
        return view('auth.index');
    }

    function login(Request $request)
    {
        Session::flash('email',$request->email);
   
        $request->validate([
            'email' => 'email',
            'password' => 'required',
        ], [
            'email.email' => 'Email tidak valid',


        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password

        ];


        if (Auth::guard('masyarakat')->attempt($infologin)) {
            toast('Berhasil Login!', 'success')->autoClose(3000);
            return redirect()->to('home');
        } else {
            return redirect()->to('auth')->withErrors('Email dan password tidak valid');
        }
    }

    function logout()
    {
        Auth::guard('masyarakat')->logout();

        toast('Berhasil Logout!', 'success')->autoClose(3000);
        return redirect()->to('auth');
    }

    function register()
    {
        return view('auth.register');
    }
    function create(Request $request)
    {

        $request->validate([
            'email' => 'required|email|unique:masyarakat',
            'nik'    => 'required|numeric',
            'nama' => 'required|max:20|min:5',
            'password' => 'required|min:5|max:10',
            'telp' => 'required|numeric',

        ], [
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Email harus valid',
            'email.unique' => 'email ini sudah terdaftar silahkan gunakan yang lain',
            'nik.required' => 'Nik wajib di isi',
            'nama.required' => 'Nama wajib di isi',
            'nama.max' => 'Batas karakter 20 digit',
            'nama.min' => 'Batas  minimum karakter 5 digit',
            'telp.required' => 'Nomor telpon wajib di isi',
            'password.required' => 'Password wajib di isi',
            'password.max' => 'batas karakter 10 digit',
            'password.min' => 'batas minimum karakter 5 digit',
            'telp.numeric' => 'Karakter hanya boleh angka',
            'nik.numeric' => 'Karakter hanya boleh angka',
           




        ]);


        $data = [
            'nik' => $request->nik,
            'tgl_bergabung' => date('Y-m-d H:i:s'),
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telp' => $request->telp,







        ];

        Masyarakat::create($data);



        alert()->success('Berhasil Membuat Akun!', 'sukses!');
        return back();
    }

    function landing()
    {
        return view('auth.landing');
    }
}
