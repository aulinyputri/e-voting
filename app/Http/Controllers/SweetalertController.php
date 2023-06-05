<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SweetalertController extends Controller
{
    public function index()
    {
        $tes = DB::table('tes')->get();
        return view('sweetalert', compact('tes'));
    }

    public function setuju(Request $request)
    {
        $id = $request->id;
        $tes = DB::table('tes')
            ->where('id', $id)
            ->update([
                'status' => 1,
            ]);

        return response()->json([
            'success' => true,
        ]);
    }

    public function hapus($id)
    {
        DB::table('tes')
            ->where('id', $id)
            ->delete();
        return response()->json([
            'success' => true,
        ]);
    }
}
