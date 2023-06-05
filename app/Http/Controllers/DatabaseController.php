<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;
use App\Imports\DatabaseImport;
use App\Exports\DatabaseExport;
use App\User;
use App\Waktu;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DatabaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $database = User::orderBy('user_id', 'desc')->where('password', null)->get();
        $waktu = Waktu::find('1');
        return view('database.index', compact('database', 'waktu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|min:3|unique:users',
            'nama' => 'required',
            'email' => 'required',
            'phone_number' => 'required'
        ], [
            'nim.required' => 'nim tidak boleh kosong',
            'nim.min' => 'nim min 3 karakter',
            'nim.unique' => 'nim sudah terdaftar',
            'nama.required' => 'nama tidak boleh kosong',
            'email.required' => 'email tidak boleh kosong',
            'phone_number.required' => 'no hp tidak boleh kosong'
        ]);

        $user = new User;
        $user->role = 'pemilih';
        $user->nim = $request->nim;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->save();
        return redirect('/admin/database')->with('sukses', 'Data database berhasil tersimpan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user->nim == $request->nim1) {
            $request->validate([
                'nim1' => 'required|min:3',
                'nama1' => 'required',
                'email1' => 'required',
                'phone_number1' => 'required'
            ], [
                'nim1.required' => 'nim tidak boleh kosong',
                'nim1.min' => 'nim min 3 karakter',
                'nama1.required' => 'nama tidak boleh kosong',
                'email1.required' => 'email tidak boleh kosong',
                'phone_number1.required' => 'no hp tidak boleh kosong'
            ]);

            $user->nim = $request->nim1;
            $user->name = $request->nama1;
            $user->email = $request->email1;
            $user->phone_number = $request->phone_number1;
            $user->save();
            return redirect('/admin/database')->with('sukses', 'Data database berhasil terupdate');
        } else {
            // Cek jika nim nya berbeda
            $cek_user = User::where('nim', $request->nim1)->first();
            if ($cek_user) {
                return redirect('/admin/database')->with('error', "NIM $request->nim1 sudah terdaftar!");
            } else {
                $user->nim = $request->nim1;
                $user->name = $request->nama1;
                $user->email = $request->email1;
                $user->phone_number = $request->phone_number1;
                $user->save();
                return redirect('/admin/database')->with('sukses', 'Data database berhasil terupdate');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/database')->with('sukses', 'Data database berhasil terhapus');
    }

    public function truncate()
    {
        DB::table('users')
            ->where('role', 'pemilih')
            ->whereNull('password')
            ->delete();
        // User::truncate();
        return redirect('/admin/database')->with('sukses', 'Data kelas berhasil dibersihkan');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'mimes:csv,xls,xlsx'
        ]);
        $file = $request->file('file');
        $nama_file = time() . '_' . $file->getClientOriginalName();
        $file->move('import_database', $nama_file);
        Excel::import(new DatabaseImport, public_path('import_database/' . $nama_file));
        return redirect('/admin/database')->with('sukses', 'Data database berhasil diimport');
    }

    public function export()
    {
        return Excel::download(new DatabaseExport, 'database.xlsx');
    }
}
