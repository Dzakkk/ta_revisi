<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonversiNip extends Model
{
    use HasFactory;

    protected $table = 'konversi_nip';
    protected $primaryKey = 'nip';

    protected $guarded = [];
}
