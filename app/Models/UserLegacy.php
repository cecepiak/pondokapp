<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use App\Models\Desa;

class UserLegacy extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $hidden = [
        'password',
        'remember_code',
    ];

    // Relasi: User -> Desa (berdasarkan kode_desa)
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'kode_desa', 'kode_desa');
    }

    /**
     * Accesor untuk field 'first_name'.
     */
    // public function getFirstNameAttribute($value)
    // {
    //     return decrypt_legacy_field($value);
    // }

    // public function getPhoneAttribute($value)
    // {
    //     return decrypt_legacy_field($value);
    // }

    // public function getEmailAttribute($value)
    // {
    //     return decrypt_legacy_field($value);
    // }
}
