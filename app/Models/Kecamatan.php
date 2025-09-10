<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';
    protected $primaryKey = 'id';

    // Relasi: Kecamatan -> Desa
    public function desa()
    {
        return $this->hasMany(Desa::class, 'kecamatan_id', 'id');
    }
}
