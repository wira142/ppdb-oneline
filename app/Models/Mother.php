<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mother extends Model
{
    use HasFactory;
    protected $primaryKey = "mother_id";
    protected $fillable = [
        'status',
        'nik',
        'name',
        'study',
        'job',
        'salary',
        'phone',
        'user_id',
    ];
}
