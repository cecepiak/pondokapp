<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetupKel extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang sesuai
    protected $table = 'setup_kel';

    // Menentukan primary key
    protected $primaryKey = 'no_kel';

    // Matikan timestamps jika tidak ada di tabel
    public $timestamps = false;
}
