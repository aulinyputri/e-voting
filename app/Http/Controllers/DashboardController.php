<?php

namespace App\Http\Controllers;

use App\Kandidat;
use App\Kelas;
use App\Suara;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $kandidat = Kandidat::all();
        $labels = [];
        foreach ($kandidat as $key => $item) {
            $labels[] = $item->nama_kandidat;
        }

        $totalSuara = [];
        foreach ($kandidat as $key => $value) {
            $result = Suara::where('kandidat_id', $value->id)->count();
            array_push($totalSuara, $result);
        }

        $data = [];
        foreach ($kandidat as $key => $value) {
            $result = Suara::where('kandidat_id', $value->id)->count();
            array_push($data, $result);
        }

        $totalSuara = [];
        foreach ($kandidat as $key => $value) {
            $result = Suara::where('kandidat_id', $value->kandidat_id)->count();
            array_push($totalSuara, $result);
        }
        $kandidat = $kandidat->map(function ($knd, $key) use ($totalSuara) {
            $knd['total'] = $totalSuara[$key];
            return $knd;
        });

        return view('dashboard', compact('labels', 'data', 'kandidat'));
    }

    public function kelas()
    {
        $kelas = User::where('role', 'user')
            ->where('password', null)
            ->count();
        return response()->json([
            'kelas' => $kelas,
        ]);
    }

    public function kandidat()
    {
        $kandidat = DB::table('kandidat')->count();
        return response()->json([
            'kandidat' => $kandidat,
        ]);
    }

    public function user()
    {
        $user = User::where('role', 'user')
            ->whereNotNull('password')
            ->count();
        return response()->json([
            'user' => $user,
        ]);
    }

    public function suara()
    {
        $suara = DB::table('suara')->count();
        return response()->json([
            'suara' => $suara,
        ]);
    }

    public function chart()
    {
        $kandidat = Kandidat::all();
        $labels = [];
        foreach ($kandidat as $key => $item) {
            $labels[] = $item->nama_kandidat;
        }

        
        $data = [];
        foreach ($kandidat as $key => $value) {
            $result = Suara::where('kandidat_id', $value->kandidat_id)->count();
            array_push($data, $result);
        }
        $kandidat = $kandidat->map(function ($knd, $key) use ($data) {
            $knd['total'] = $data[$key];
            return $knd;
        });
        

        return response()->json([
            'labels' => $labels,
            'data' => $data,
        ]);
    }
}
