<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    protected $dates = ['created_at'];

    protected $table = 'children';

    protected $primaryKey = 'id';
    protected $guarded = [];

    public function biodata()
    {
        return $this->belongsTo(Biodata::class, 'nik', 'nik');
    }
}
