<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histori extends Model
{

    use HasFactory;

    protected $dates = ['created_at'];

    protected $table = 'histori';

    protected $primaryKey = 'id';
    protected $fillable = [
        'waktu',
        'keterangan',
    ];
}
