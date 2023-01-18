<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationForm extends Model
{
    use HasFactory;
    protected $primaryKey = 'form_id';
    protected $keyType = 'string';
    protected $fillable = [
        'user_id',
        'poster',
        'title',
        'time_expired',
        'degree',
        'description',
    ];
}
