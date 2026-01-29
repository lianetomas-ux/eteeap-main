<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'unique_id',
        'name',
        'first_name',
        'middle_name',
        'surname',
        'extension',
        'email',
        'password',
        'role',
        'submission_count',
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
        'password' => 'hashed',
    ];

    /**
     * Get the applications for the user.
     */
    public function applications()
    {
        return $this->hasMany(ApplicationForm::class);
    }

    /**
     * Get the user's full name.
     */
    public function getFullNameAttribute()
    {
        $nameParts = [$this->first_name];
        
        if ($this->middle_name) {
            $nameParts[] = $this->middle_name;
        }
        
        $nameParts[] = $this->surname;
        
        if ($this->extension) {
            $nameParts[] = $this->extension;
        }
        
        return implode(' ', $nameParts);
    }

    /**
     * Check if user is admin.
     */
    public function isAdmin()
    {
        return $this->role === 2;
    }

    /**
     * Check if user is assessor.
     */
    public function isAssessor()
    {
        return $this->role === 3;
    }

    /**
     * Check if user is applicant.
     */
    public function isApplicant()
    {
        return $this->role === 1;
    }
}