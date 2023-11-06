<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    protected $dates = ['created_at'];

    protected $table = 'gaji';

    protected $primaryKey = 'id';
    protected $guarded = [];
}
