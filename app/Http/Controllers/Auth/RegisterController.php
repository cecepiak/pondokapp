<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB; // Tambahkan ini

class RegisterController extends Controller
{
    // ... (metode showLoginForm dan login yang sudah ada)

    public function showRegistrationForm()
    {
        // Ambil data kecamatan dari tabel setup_kec
        $kecamatans = DB::table('setup_kec')->orderBy('nama_kec')->get();
        return view('auth.register', compact('kecamatans'));
    }

    /**
     * Metode baru untuk mendapatkan desa berdasarkan ID kecamatan.
     * Ini akan digunakan oleh AJAX.
     */
    public function getDesa(Request $request)
    {
        $kecamatanId = $request->input('id_kecamatan');
        $desas = DB::table('setup_kel')
                    ->where('no_kec', $kecamatanId)
                    ->orderBy('nama_kel')->get();

        return response()->json($desas);
    }
    
    public function register(Request $request)
    {
        // ... (metode register yang sudah ada)
    }

    protected function validator(array $data)
    {
        // ... (metode validator yang sudah ada)
    }
}