<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        $transactions = collect(); // Inisialisasi koleksi kosong

        if (Auth::check()) {
            $userId = Auth::user()->id_user; // Sesuaikan dengan nama field di model User Anda
            $transactions = Transaksi::where('id_user', $userId)->get();
        }

        return view('transaksi', ['transactions' => $transactions]);
    }
}