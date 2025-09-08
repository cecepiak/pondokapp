<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetupKec extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang sesuai
    protected $table = 'setup_kec';

    // Menentukan primary key
    protected $primaryKey = 'no_kec';

    // Matikan timestamps jika tidak ada di tabel
    public $timestamps = false;
}
