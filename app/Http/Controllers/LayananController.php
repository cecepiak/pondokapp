<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LayananController extends Controller
{
    /**
     * Tampilkan formulir konsultasi dengan data dropdown.
     *
     * @return \Illuminate\View\View
     */
    public function showForm()
    {
        // Ambil data jenis pengaduan dari tabel setup_pengaduan yang berstatus aktif
        $jenisPengaduan = DB::table('setup_pengaduan')
                            ->where('aktif', 'Y') // Asumsi 1 berarti aktif
                            ->orderBy('ket_pengaduan', 'asc')
                            ->get();
        
        return view('formulir-konsultasi', compact('jenisPengaduan'));
    }

    /**
     * Proses data yang dikirim dari formulir konsultasi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitForm(Request $request)
    {
        // Lakukan validasi data di sini
        $validated = $request->validate([
            'nik' => 'required|numeric|digits:16',
            'nama' => 'required|string',
            'nomor_hp' => 'required|numeric',
            'alamat' => 'required|string',
            'jenis_konsultasi' => 'required|string',
            'isi_informasi' => 'required|string',
        ]);

        // Simpan data ke database atau lakukan aksi lainnya
        // ...

        return redirect('/')->with('success', 'Konsultasi Anda berhasil dikirim!');
    }
}