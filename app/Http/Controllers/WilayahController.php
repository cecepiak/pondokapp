<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WilayahController extends Controller
{
    /**
     * Metode baru untuk mendapatkan desa berdasarkan ID kecamatan.
     * Ini akan digunakan oleh AJAX.
     */
    public function getDesa(Request $request)
    {
        $kecamatanId = $request->input('id_kecamatan');
        $desas = DB::table('desa')
            ->where('kecamatan_id', $kecamatanId)
            ->orderBy('nama')->get();

        return response()->json($desas);
    }

    public function getAllWilayah(Request $request)
    {
        $desaId = $request->input('id_desa');
        $kecamatans = DB::table('desa')
            ->where('kode_desa', $desaId)
            ->join('kecamatan', 'desa.kecamatan_id', '=', 'kecamatan.id')
            ->select('kecamatan.*', 'kecamatan.nama as nama_kecamatan', 'desa.nama as nama_desa')
            ->orderBy('id')->get();

        return response()->json($kecamatans);
    }
}
