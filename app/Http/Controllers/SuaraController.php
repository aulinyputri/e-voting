<?php

namespace App\Http\Controllers;

use App\Exports\SuaraExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Suara;
use App\Waktu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suara = Suara::orderBy('suara_id', 'desc')->get();
        $waktu = Waktu::find('1');
        return view('suara.index', compact('suara', 'waktu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Suara  $suara
     * @return \Illuminate\Http\Response
     */
    public function show(Suara $suara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Suara  $suara
     * @return \Illuminate\Http\Response
     */
    public function edit(Suara $suara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Suara  $suara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suara $suara)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Suara  $suara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suara $suara)
    {
        //
    }

    public function export()
    {
        return Excel::download(new SuaraExport, 'Suara.xlsx');
    }

    public function truncate()
    {
        Suara::truncate();
        return redirect('/admin/suara')->with('sukses', 'Data suara berhasil dibersihkan');
    }
}
