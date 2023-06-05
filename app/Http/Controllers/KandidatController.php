<?php

namespace App\Http\Controllers;

use App\Kandidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class KandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kandidat = Kandidat::orderBy('kandidat_id', 'desc')->get();
        return view('kandidat.index', compact('kandidat'));
    }


    public function create()
    {
        return view('kandidat.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'nama_kandidat' => 'required',
            'nama_calon' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png,csv',
        ], [
            'nama_kandidat.required' => 'nama kandidat tidak boleh kosong',
            'nama_calon.required' => 'nama calon tidak boleh kosong',
            'foto.required' => 'foto tidak boleh kosong',
        ]);


        $kandidat = new Kandidat;

        $foto = $request->file('foto');
        $nama_foto = time() . '_' . $foto->getClientOriginalName();
        $foto->move('foto', $nama_foto);

        $kandidat->foto = $nama_foto;
        $kandidat->nama_kandidat = $request->nama_kandidat;
        $kandidat->no_paslon = $request->nama_calon;
        $kandidat->save();
        return redirect('/admin/kandidat')->with('sukses', 'Data kandidat berhasil tersimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kandidat  $Kandidat
     * @return \Illuminate\Http\Response
     */
    public function edit(Kandidat $kandidat)
    {
        return view('kandidat.edit', compact('kandidat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kandidat  $Kandidat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kandidat $kandidat)
    {
        $request->validate([
            'nama_kandidat' => 'required',
            'nama_calon' => 'required',
            'foto' => 'mimes:jpg,jpeg,png,csv',
        ], [
            'nama_kandidat.required' => 'nama kandidat tidak boleh kosong',
            'nama_calon.required' => 'nama calon tidak boleh kosong',
        ]);
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama_foto = time() . '_' . $foto->getClientOriginalName();
            $foto->move('foto', $nama_foto);
            if ($kandidat->foto != 'default.png') {
                File::delete('foto/' . $kandidat->foto);
            }
            $kandidat->foto = $nama_foto;
            $kandidat->save();
        }
        $kandidat->nama_kandidat = $request->nama_kandidat;
        $kandidat->no_paslon = $request->nama_calon;
        $kandidat->save();
        return redirect('/admin/kandidat')->with('sukses', 'Data kandidat berhasil terupdate');
    }

    public function destroy(Kandidat $kandidat)
    {
        if ($kandidat->foto != 'default.png') {
            File::delete('foto/' . $kandidat->foto);
        }
        $kandidat->delete();
        return redirect('/admin/kandidat')->with('sukses', 'Data kandidat berhasil terhapus');
    }
}
