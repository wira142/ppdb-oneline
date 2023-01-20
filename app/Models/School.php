<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $primaryKey = 'school_id';
    protected $keyType = "string";
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'city',
        'district',
        'province',
        'school_image',
        'village',
        'description',
    ];
    public function registrationForm()
    {
        return $this->hasMany(RegistrationForm::class, 'school_id');
    }
}
