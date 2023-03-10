<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $primaryKey = "registration_id";
    protected $keyType = "string";
    protected $fillable = [
        'form_id',
        'user_id',
        'status',
    ];
    public function form()
    {
        return $this->belongsTo(RegistrationForm::class, 'form_id', 'form_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
