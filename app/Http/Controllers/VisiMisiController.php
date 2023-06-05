<?php

namespace App\Http\Controllers;

use App\Kandidat;
use App\Suara;
use App\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visimisi = VisiMisi::orderBy('id', 'desc')->get();
        return view('visimisi.index', compact('visimisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kandidat = Kandidat::all();
        return view('visimisi.create', compact('kandidat'));
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
            'visi' => 'required',
            'misi' => 'required',
        ], [
            'visi.required' => 'visi tidak boleh kosong',
            'misi.required' => 'misi tidak boleh kosong',
        ]);

        $kandidat = VisiMisi::where('kandidat_id', $request->kandidat_id)->count();

        if ($kandidat > 0) {
            return redirect('/admin/visimisi/create')->with('warning', 'Kandidat yang anda pilih telah tersimpan');
        } else {
            VisiMisi::create($request->all());

            return redirect('/admin/visimisi')->with('sukses', 'Data visi & misi berhasil terimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VisiMisi  $visiMisi
     * @return \Illuminate\Http\Response
     */
    public function show(VisiMisi $visiMisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VisiMisi  $visiMisi
     * @return \Illuminate\Http\Response
     */
    public function edit(VisiMisi $visiMisi)
    {
        $kandidat = Kandidat::all();
        return view('visimisi.edit', compact('visiMisi', 'kandidat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VisiMisi  $visiMisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $visimisi = VisiMisi::find($id);
        $request->validate([
            'visi' => 'required',
            'misi' => 'required',
        ], [
            'visi.required' => 'visi tidak boleh kosong',
            'misi.required' => 'misi tidak boleh kosong',
        ]);

        if ($visimisi->kandidat_id == $request->kandidat_id) {
            $visimisi->kandidat_id = $request->kandidat_id;
            $visimisi->visi = $request->visi;
            $visimisi->misi = $request->misi;
            $visimisi->save();

            return redirect('/admin/visimisi')->with('sukses', 'Data visi & misi berhasil terupdate');
        } else {
            $kandidat = VisiMisi::where('kandidat_id', $request->kandidat_id)->count();

            if ($kandidat > 0) {
                return redirect('/admin/visimisi/' . $request->id . '/edit')->with('warning', 'Kandidat yang anda pilih telah tersimpan');
            } else {
                $visimisi->kandidat_id = $request->kandidat_id;
                $visimisi->visi = $request->visi;
                $visimisi->misi = $request->misi;
                $visimisi->save();

                return redirect('/admin/visimisi')->with('sukses', 'Data visi & misi berhasil terupdate');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VisiMisi  $visiMisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(VisiMisi $visiMisi)
    {
        $visiMisi->delete();
        return redirect('/admin/visimisi')->with('sukses', 'Data visi & misi berhasil terhapus');
    }

    public function truncate()
    {
        VisiMisi::truncate();
        return redirect('/admin/visimisi')->with('sukses', 'Data visi & misi berhasil dibersihkan');
    }
}
