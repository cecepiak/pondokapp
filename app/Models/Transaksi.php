<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // Menetapkan nama tabel
    protected $table = 'transaksi';

    // Menetapkan primary key
    protected $primaryKey = 'id_trx';
    
    // Menonaktifkan timestamps karena tabel tidak memiliki created_at dan updated_at
    public $timestamps = false;

    // Mendefinisikan semua field yang bisa diisi (fillable)
    protected $fillable = [
        'id_trx',
        'qr',
        'no_resi',
        'salt_trx',
        'ip_address_trx',
        'no_kk',
        'tgl',
        'tgl_selesai',
        'jam_selesai',
        'jam',
        'jam_respon',
        'tgl_respon',
        'id_user',
        'no_kec',
        'no_kel',
        'id_dokumen',
        'sub_dokumen',
        'status',
        'status_pengajuan',
        'ket',
        'ket2',
        'isi_perubahan',
        'ikm',
        'count_cetak',
        'cetak',
        'dokumen',
        'dokumen2',
        'dokumen3',
        'pengambilan_tempat',
        'aktif',
        'tgl_aktif',
        'jam_aktif',
        'user_aktif',
        'ket_ambil',
        'tgl_cetak',
        'alasan_req',
        'opr_first',
        'opr_last',
        'rubah_kk',
        'baca',
        'konfirmasi',
        'tgl_konfirmasi',
        'jam_konfirmasi',
        'user_konfirmasi',
    ];
}
