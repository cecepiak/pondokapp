<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserLegacy;
use App\Models\SetupKec;
use App\Models\SetupKel;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function index()
    {
        $userId = session('auth_user_id');
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Silakan login.');
        }

        // Ambil user + eager load relasi desa dan kecamatan-nya
        $user = UserLegacy::with('desa.kecamatan')->find($userId);

        if (!$user) {
            abort(404);
        }

        // Ambil semua kecamatan & kelurahan untuk dropdown
        $kecamatanList = SetupKec::orderBy('nama')->get();
        $desaList = SetupKel::orderBy('nama')->where('kecamatan_id', $user->desa->kecamatan->id)->get();

        // Kirim ke view
        return view('account.index', compact('user', 'kecamatanList', 'desaList'));
    }
}
