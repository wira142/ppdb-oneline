<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    protected $primaryKey = "personal_id";
    protected $fillable = [
        'user_id',
        'image',
        'nisn',
        'nik',
        'phone',
        'religion',
        'gender',
        'birthday',
        'birthplace',
        'address',
        'village',
        'city',
        'district',
        'province',
    ];
}
