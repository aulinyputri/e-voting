<?php

namespace App\Http\Controllers;

use App\Kandidat;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kandidat  $Kandidat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user->email == $request->email) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email:rfc',
                'phone_number' => 'required'
            ], [
                'name.required' => 'nama tidak boleh kosong',
                'email.required' => 'email tidak boleh kosong',
                'phone_number.required' => 'no hp tidak boleh kosong'
            ]);
        } else {
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users|email:rfc',
                'phone_number' => 'required'
            ], [
                'name.required' => 'nama tidak boleh kosong',
                'email.required' => 'email tidak boleh kosong',
                'phone_number.required' => 'no hp tidak boleh kosong'
            ]);
        }


        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->save();

        return redirect('/admin/profile')->with('sukses', 'Data profile berhasil terupdate');
    }

    public function updatepassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required',
        ], [
            'password.required' => 'password tidak boleh kosong',
            'password.min' => 'password minimal 3 karakter',
            'password.confirmed' => 'konfirmasi password harus sama',
            'password_confirmation.required' => 'konfirmasi password tidak boleh kosong',
        ]);

        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/admin/profile')->with('sukses', 'Password berhasil terupdate');
    }
}
