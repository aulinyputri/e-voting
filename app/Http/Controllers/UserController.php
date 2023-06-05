<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Suara;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use App\Waktu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('users')
            ->where('role', 'pemilih')
            ->whereNotNull('password')
            ->get();
        $waktu = Waktu::find('1');

        return view('user.index', compact('user', 'waktu'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = Suara::where('user_id', $id)->first();
        if ($cek) {
            return redirect('/admin/user')->with('error', 'Maaf data tersebut tidak dapat dihapus karena sudah ada didata suara');
        } else {
            $user = User::find($id);
            $user->delete();
            return redirect('/admin/user')->with('sukses', 'Data user berhasil terhapus');
        }
    }

    public function export()
    {
        return Excel::download(new UserExport, 'user.xlsx');
    }

    public function truncate()
    {
        $cek = Suara::all();
        if (count($cek) > 0) {
            return redirect('/admin/user')->with('error', 'Maaf data tersebut tidak dapat dibersihkan, silahkan bersihkan dulu semua data suara');
        } else {
            DB::table('users')
                ->where('role', 'pemilih')
                ->whereNotNull('password')
                ->delete();
            return redirect('/admin/user')->with('sukses', 'Data user berhasil dibersihkan');
        }
    }
}
