<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {

        //validasi input
        $request->validate([
            'nama' => 'required',
            'password' => 'required',
        ]);

        // ambil data input
        $name = $request->input('name');
        $password = $request->input('password');

        //cari pengguna berdasarkan nama
        $user = User::where('nama', $name)->first();

        if ($user && Hash::check($password, $user->password)) {
            // Jika cocok, set session untuk menandai pengguna telah login
            session(['user_id' => $user->id]);

            // Redirect ke halaman setelah login sukses
            return redirect()->route('pegawai'); // Ganti dengan nama route halaman setelah login
        } else {
            // Jika tidak cocok, kembali ke halaman login dengan pesan error
            return redirect()->route('login')->with('error', 'Username atau password salah.');
        }
    }*/

    public function showloginform()
    {
        if (Auth::check()) {
            return redirect('pegawai');
        }else{
            return view('login');
        }
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect('pegawai');
        }else{
            Session::flash('error', 'Username atau Password Salah');
            return redirect('login');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('login');
    }
}
