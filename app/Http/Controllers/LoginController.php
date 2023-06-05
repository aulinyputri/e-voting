<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login_admin');
    }

    public function proseslogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc',
            'password' => 'required|min:3',
        ], [
            'email.required' => 'email tidak boleh kosong',
            'email.email' => 'email harus valid',
            'password.required' => 'password tidak boleh kosong',
            'password.min' => 'password minimal 3 karakter',
        ]);

        $login = $request->only('email', 'password');
        if (Auth::attempt($login)) {
            return redirect()->intended('/admin/dashboard');
        } else {
            return redirect('/admin/login')->with('error', 'Email / Password anda salah!!!');
        }
    }

    public function registasi_user(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email:rfc|unique:users',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required',
        ], [
            'nama.required' => 'nama tidak boleh kosong',
            'email.required' => 'email tidak boleh kosong',
            'email.unique' => 'email sudah terdaftar',
            'password.required' => 'password tidak boleh kosong',
            'password.min' => 'password minimal 3 karakter',
            'password.confirmed' => 'konfirmasi password harus sama',
            'password_confirmation.required' => 'konfirmasi password tidak boleh kosong',
        ]);
        $user = new User;
        $user->kelas_id = $request->kelas;
        $user->role = 'user';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/#registrasi')->with('sukses', 'Akun berhasil teregistrasi');
    }

    public function login_user(Request $request)
    {
        $request->validate([
            'nimuser' => 'required',
            'passworduser' => 'required|min:3',
        ], [
            'nimuser.required' => 'nim tidak boleh kosong',
            'passworduser.required' => 'password tidak boleh kosong',
            'passworduser.min' => 'password minimal 3 karakter',
        ]);

        $cek_login = User::where('nim', $request->nimuser)->first();
        if ($cek_login) {
            if ($cek_login->password != null) {
                if ($cek_login->code_unique == $request->kodeunikuser) {
                    if (Hash::check($request->passworduser, $cek_login->password)) {
                        session([
                            'login' => true,
                            'user_id' => $cek_login->user_id,
                            'nama' => $cek_login->name,
                        ]);
                        return redirect('/home');
                    } else {
                        return redirect('/')->with('error', 'NIM, Kode Unik atau Password Anda salah!');
                    }
                } else {
                    return redirect('/')->with('error', 'NIM, Kode Unik atau Password Anda salah!');
                }
            } else {
                return redirect('/')->with('error', 'NIM Anda belum terverifikasi, silahkan lakukan verifikasi terlebih dahulu!');
            }
        } else {
            return redirect('/')->with('error', 'NIM, Kode Unik atau Password Anda salah!');
        }
    }

    public function logout_admin()
    {
        Auth::logout();
        return redirect('/admin/login');
    }

    public function logout_user(Request $request)
    {
        $request->session()->forget(['login', 'id']);
        return redirect('/');
    }
}
