<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pegawai extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $dates = ['created_at'];

    protected $table = 'pegawai';

    protected $primaryKey = 'nip';
    protected $guarded = [];


    public function biodata()
    {
        return $this->hasOne(Biodata::class, 'nip', 'nip');
    }

    // Definisikan hubungan ke pendidikan
    public function pendidikan()
    {
        return $this->hasOne(Pendidikan::class, 'nip', 'nip');
    }

    // Definisikan hubungan ke keluarga
    public function keluarga()
    {
        return $this->hasOne(Keluarga::class, 'nip', 'nip');
    }

    // Definisikan hubungan ke pangkat
    public function pangkat()
    {
        return $this->hasOne(Pangkat::class, 'nip', 'nip');
    }

    public function cuti()
    {
        return $this->hasOne(Cuti::class, 'nip', 'nip');
    }

    public function pelatihan()
    {
        return $this->hasOne(Pelatihan::class, 'nip', 'nip');
    }


    protected $hidden = [
        'password',
        'remember_token',
    ];
}
