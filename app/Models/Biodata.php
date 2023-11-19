<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Biodata extends Model
{
    use HasFactory;

    protected $dates = ['created_at'];

    protected $table = 'biodata';

    protected $primaryKey = 'nik';
    protected $guarded = [];

   
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'nip', 'nip');
    }

    public function keluarga()
    {
        return $this->hasOne(Keluarga::class, 'nik', 'nik');
    }

    public function child()
    {
        return $this->hasMany(Child::class, 'nik', 'nik');
    }
}
