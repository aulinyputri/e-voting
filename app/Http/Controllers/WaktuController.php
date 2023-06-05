<?php

namespace App\Http\Controllers;

use App\Waktu;
use Illuminate\Http\Request;

class WaktuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $waktu = Waktu::find('1');
        return view('waktu', compact('waktu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\waktu  $waktu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'tanggal_mulai' => 'required',
        //     'tanggal_akhir' => 'required'
        // ], [
        //     'tanggal_mulai.required' => 'tanggal mulai tidak boleh kosong',
        //     'tanggal_akhir.required' => 'tanggal akhir tidak boleh kosong'
        // ]);
        $request->validate([
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
            'jam_mulai' => 'required',
            'jam_akhir' => 'required'
        ], [
            'jam_mulai.required' => 'jam mulai tidak boleh kosong',
            'jam_akhir.required' => 'jam akhir tidak boleh kosong',
            'tanggal_mulai.required' => 'tanggal mulai tidak boleh kosong',
            'tanggal_akhir.required' => 'tanggal akhir tidak boleh kosong'
        ]);


        $waktu = Waktu::find($id);
        $waktu->tanggal_mulai = $request->tanggal_mulai;
        $waktu->tanggal_akhir = $request->tanggal_akhir;
        // $waktu->jam_mulai = $request->jam_mulai . ":" . $request->menit_mulai;
        // $waktu->jam_akhir = $request->jam_akhir . ":" . $request->menit_akhir;
        $waktu -> jam_mulai = $request->jam_mulai;
        $waktu -> jam_akhir = $request ->jam_akhir;
        $waktu->save();
        return redirect('/admin/waktu')->with('sukses', 'Waktu berhasil diupdate');
    }
}
