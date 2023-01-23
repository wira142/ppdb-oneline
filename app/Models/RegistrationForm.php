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
        'school_id',
        'poster',
        'title',
        'time_expired',
        'degree',
        'description',
    ];

    public function registrator()
    {
        return $this->hasMany(Registration::class, 'form_id', 'form_id');
    }
    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }
}
