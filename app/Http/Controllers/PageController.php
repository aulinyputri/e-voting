<?php

namespace App\Http\Controllers;

use App\Kandidat;
use App\User;
use App\Suara;
use App\VisiMisi;
use App\Waktu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Poster;

class PageController extends Controller
{
    public function index()
    {
        $user = User::where('role', 'admin')->first();
        $phone_number = "62" . substr($user->phone_number, 1);
        return view('welcome', compact('phone_number'));
    }

    public function verifikasi()
    {
        return view('verifikasi');
    }

    public function verifikasi_cek(Request $request)
    {
        $request->validate([
            'nim' => 'required'
        ], [
            'nim.required' => 'nim tidak boleh kosong'
        ]);

        $cek_nim = User::where('nim', $request->nim)
            ->where('name', $request->name)
            ->first();
        if ($cek_nim) {
            // return redirect('/verifikasi/inputdata/' . $request->nim);
            return redirect('/verifikasi/email/' . $request->nim);
        } else {
            return redirect('/verifikasi')->with('error', 'Nim atau Nama Anda tidak ditemukan!');
        }
    }

    public function verifikasi_email($nim)
    {
        $cek_nim = User::where('nim', $nim)->first();
        if ($cek_nim) {
            // Sensor menggunakan *****
            $username = substr($cek_nim->email, 0, strpos($cek_nim->email, '@'));
            $maskedUsername = substr($username, 0, 3) . str_repeat('*', strlen($username) - 3);
            $email = $maskedUsername . substr($cek_nim->email, strpos($cek_nim->email, '@'));

            $nim = $cek_nim->nim;

            if ($cek_nim) {

                if ($cek_nim->code_unique == null) {
                    $cek_nim->code_unique = Str::random(6);
                    $cek_nim->save();
                }

                $details = [
                    "title" => "Hai $cek_nim->name",
                    "body"  => "Kode unik Anda $cek_nim->code_unique, silahkan masukan pada saat melakukan login."
                ];

                Mail::to($cek_nim->email)->send(new SendMail($details));
                return view('verifikasi_email', compact('email', 'nim'));
            } else {
                return redirect('/verifikasi')->with('error', 'Nim tidak ditemukan!');
            }
        } else {
            abort(404);
        }
    }

    public function verifikasi_password($nim)
    {
        $cek_nim = User::where('nim', $nim)->first();
        if ($cek_nim) {
            $nim = $cek_nim->nim;
            return view('verifikasi_input_data', compact('nim'));
        } else {
            abort(404);
        }
    }

    public function input_data($nim)
    {
        $cek_nim = User::where('nim', $nim)->first();
        if ($cek_nim) {
            $nama = $cek_nim->name;
            if ($cek_nim) {
                return view('verifikasi_input_data', compact('nim', 'nama'));
            } else {
                return redirect('/verifikasi')->with('error', 'Nim tidak ditemukan!');
            }
        } else {
            abort(404);
        }
    }

    public function verifikasi_email_post(Request $request)
    {
        $request->validate([
            'kodeunik' => 'required'
        ], [
            'kodeunik.required' => 'Kode Unik tidak boleh kosong'
        ]);

        $user = User::where('code_unique', $request->kodeunik)->first();
        if ($user) {
            return redirect('/verifikasi/password/' . $request->nim);
        } else {
            return redirect('/verifikasi/email/' . $request->nim)->with('error', 'Kode unik salah!');
        }
    }

    public function input_data_post(Request $request)
    {
        $request->validate([
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required'
        ], [
            'password.required' => 'password tidak boleh kosong',
            'password.min' => 'password minimal 3 karakter',
            'password.confirmed' => 'konfirmasi password harus sama',
            'password_confirmation.required' => 'konfirmasi password tidak boleh kosong',
        ]);

        $user = User::where('nim', $request->nim)->first();
        $user->role = 'pemilih';
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/')->with('sukses', 'Isi data berhasil, silahkan login');
    }

    public function home(Request $request)
    {
        $user = DB::table('users')
            ->where('user_id', $request->session()->get('user_id'))
            ->first();

        $kandidat = Kandidat::all();
        $labels = [];
        foreach ($kandidat as $key => $item) {
            $labels[] = $item->nama_kandidat;
        }

        $suara1 = Suara::where('kandidat_id', 1)->count();
        $suara2 = Suara::where('kandidat_id', 2)->count();
        $suara3 = Suara::where('kandidat_id', 3)->count();
        $data = [];
        array_push($data, $suara1, $suara2, $suara3);

        $waktu = Waktu::find('1');

        $poster = Poster::all();

        return view('home', compact('user', 'labels', 'data', 'waktu', 'poster'));
    }

    public function voting(Request $request)
    {
        $user = DB::table('users')
            ->where('user_id', $request->session()->get('user_id'))
            ->first();
        $visimisi = VisiMisi::all();
        $waktu = Waktu::find('1');

        return view('voting', compact('visimisi', 'user', 'waktu'));
    }

    public function suara(Request $request)
    {
        $user = DB::table('users')
            ->where('user_id', $request->session()->get('user_id'))
            ->first();
        $visimisi = VisiMisi::all();
        $waktu = Waktu::find('1');
        $kandidat = Kandidat::all();
        $totalSuara = [];
        foreach ($kandidat as $key => $value) {
            $result = Suara::where('kandidat_id', $value->kandidat_id)->count();
            array_push($totalSuara, $result);
        }
        $kandidat = $kandidat->map(function ($knd, $key) use ($totalSuara) {
            $knd['total'] = $totalSuara[$key];
            return $knd;
        });

        $labels = [];
        foreach ($kandidat as $key => $item) {
            $labels[] = $item->nama_kandidat;
        }

        return view('suara', compact('visimisi', 'user', 'waktu', 'kandidat', 'labels', 'totalSuara'));
    }

    public function voting_kandidat(Request $request)
    {

        $user = User::find($request->session()->get('user_id'));
        $user->status = 1;
        $user->save();

        $suara = new Suara;
        $suara->user_id = $request->session()->get('user_id');
        $suara->kandidat_id = $request->id_kandidat;
        $suara->save();

        return response()->json([
            'success' => true,
            'message' => 'berhasil',
        ]);
    }
}
