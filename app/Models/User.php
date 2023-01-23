<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'id',
        'image'
    ];
    public $incrementing = false;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // relations

    public function personal()
    {
        return $this->hasOne(Personal::class, 'user_id');
    }
    public function father()
    {
        return $this->hasOne(Father::class, 'user_id');
    }
    public function mother()
    {
        return $this->hasOne(Mother::class, 'user_id');
    }
    public function school()
    {
        return $this->hasOne(School::class, 'user_id');
    }
    public function registration()
    {
        return $this->hasMany(Registration::class, 'user_id');
    }
}
