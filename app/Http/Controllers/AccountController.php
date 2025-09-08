<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserLegacy;
// use Illuminate\Support\Facades\Auth;
use App\Models\SetupKec;
use App\Models\SetupKel;

class AccountController extends Controller
{
    public function index()
    {
        // Asumsi mengambil pengguna dengan ID 1
        $user = UserLegacy::find(126);
        // Mengambil semua data kecamatan dan kelurahan untuk dropdown
        $kecamatan = SetupKec::all();
        $kelurahan = SetupKel::all();
        
        // Kirim data pengguna yang sudah di-decode ke view
        return view('account.index', compact('user', 'kecamatan', 'kelurahan'));
    }
}
