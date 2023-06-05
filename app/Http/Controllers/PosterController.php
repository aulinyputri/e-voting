<?php

namespace App\Http\Controllers;

use App\Poster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poster = Poster::orderBy('id', 'desc')->get();
        return view('poster.index', compact('poster'));
    }


    public function create()
    {
        return view('poster.create');
    }

    public function save(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'foto' => 'required|mimes:jpg,jpeg,png,csv'
        ], [
            'foto.required' => 'foto tidak boleh kosong',
        ]);
        $kandidat = new Poster;
        $foto = $request->file('foto');
        $nama_foto = time() . '_' . $foto->getClientOriginalName();
        $foto->move('foto', $nama_foto);
        $kandidat->poster = $nama_foto;
        $kandidat->save();
        return redirect('/admin/poster')->with('sukses', 'Data poster berhasil tersimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kandidat  $Kandidat
     * @return \Illuminate\Http\Response
     */
    public function edit(Poster $poster)
    {
        return view('poster.edit', compact('poster'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Poster  $Poster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poster $poster)
    {
        $request->validate([
            'foto' => 'mimes:jpg,jpeg,png,csv',
        ], []);
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama_foto = time() . '_' . $foto->getClientOriginalName();
            $foto->move('foto', $nama_foto);
            if ($poster->poster != 'default.png') {
                File::delete('foto/' . $poster->poster);
            }
            $poster->poster = $nama_foto;
            $poster->save();
        }
        return redirect('/admin/poster')->with('sukses', 'Data poster berhasil terupdate');
    }

    public function destroy(Poster $poster)
    {
        if ($poster->foto != 'default.png') {
            File::delete('foto/' . $poster->poster);
        }
        $poster->delete();
        return redirect('/admin/poster')->with('sukses', 'Data poster berhasil terhapus');
    }

    public function truncate()
    {
        Poster::truncate();
        return redirect('/admin/poster')->with('sukses', 'Data poster berhasil dibersihkan');
    }
}
