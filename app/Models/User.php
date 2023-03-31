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
        'google_id',
        'email',
        'password',
        'institution',
        'phone',
        'transport',
        'photo',
        'sppd',
        'ktm',
        'transfer',
        'role',
    ];

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
    public function ekstract()
    {
        $this->photo = $this->photo ? url('images/' . $this->photo) : null;
        $this->sppd = $this->sppd ? url('images/' . $this->sppd) : null;
        $this->ktm = $this->ktm ? url('images/' . $this->ktm) : null;
        $this->transfer = $this->transfer ? url('images/' . $this->transfer) : null;
    }
}
