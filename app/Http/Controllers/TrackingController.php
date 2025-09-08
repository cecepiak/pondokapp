<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index()
    {
        // Data dummy untuk contoh. Di aplikasi nyata, Anda akan mengambilnya dari database.
        $transactions = [
            [
                'id' => 'TRX-12345',
                'status' => 'Pesanan Dikonfirmasi',
                'date' => '2024-05-20 10:30:00'
            ],
            [
                'id' => 'TRX-12345',
                'status' => 'Pesanan Sedang Diproses',
                'date' => '2024-05-20 12:45:00'
            ],
            [
                'id' => 'TRX-12345',
                'status' => 'Pesanan Dalam Pengiriman',
                'date' => '2024-05-21 09:00:00'
            ],
            [
                'id' => 'TRX-12345',
                'status' => 'Pesanan Tiba di Lokasi',
                'date' => '2024-05-22 14:15:00'
            ],
            [
                'id' => 'TRX-12345',
                'status' => 'Pesanan Selesai',
                'date' => '2024-05-22 17:30:00'
            ]
        ];

        return view('tracking.index', compact('transactions'));
    }
}
