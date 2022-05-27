<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoleAndPermission;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hden = [
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

    // Doctor functions

    private function getDoctor()
    {
         return $this->hasOne(Doctor::class);
    }

    public function isDoctor()
    {
        return $this->getDoctor()->exists();
    }

    public function doctor()
    {
        return $this->isDoctor() ? $this->getDoctor()->first() : null;
    }

    // Patient functions

    private function getPatient()
    {
        return $this->hasOne(Patient::class);
    }

    public function isPatient()
    {
        return $this->getPatient()->exists();
    }

    public function patient()
    {
        return $this->isPatient() ? $this->getPatient()->first() : null;
    }
}
