<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $table = 'desa';
    protected $primaryKey = 'id';

    // Relasi: Desa -> Kecamatan
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id', 'id');
    }

    // Relasi: Desa -> UserLegacy (opsional, jika dibutuhkan)
    public function users()
    {
        return $this->hasMany(UserLegacy::class, 'kode_desa', 'kode_desa');
    }
}
