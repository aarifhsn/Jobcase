<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Filament\Notifications\Notification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\SendEmailOtpNotification;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Gate;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'skills',
        'about',
        'language',
        'designation',
        'profile_image',
        'remember_token',
        'email_verified_at',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'whatsapp_url',
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

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function subscription()
    {
        return $this->hasMany(Subscription::class);
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id')->withTimestamps();
    }

    public function candidate()
    {
        return $this->hasOne(Candidate::class);
    }

    public function recruiter()
    {
        return $this->hasOne(Recruiter::class);
    }

    public function job()
    {
        return $this->hasMany(Job::class);
    }

    public function getFirstNameAttribute()
    {
        return explode(' ', $this->name)[0] ?? $this->name;
    }

    /**
     * Check if the user has that particular role.
     *
     * @param string $role
     * @return bool
     */
    public function hasRole(string $role): bool
    {
        return $this->roles->contains(function ($r) use ($role) {
            return $r->slug === $role || $r->name === $role;
        });
    }

    /**
     * Get all the permissions the user has through its roles.
     *
     * @return \Illuminate\Support\Collection
     */
    public function permissions(): \Illuminate\Support\Collection
    {
        return
            $this->roles()->with('permissions')->get()
            ->pluck('permissions')
            ->flatten()
            ->unique('id');
    }

    public function getNameInitialsAttribute()
    {
        $nameParts = explode(' ', $this->name);
        $initials = '';

        foreach ($nameParts as $part) {
            if (!empty($part)) {
                $initials .= strtoupper(substr($part, 0, 1));
            }
        }

        return $initials ?: strtoupper(substr($this->name, 0, 2));
    }

    public function isSubscribed($categoryId)
    {
        return $this->candidate()->where('category_id', $categoryId)->exists();
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin') {
            return $this->hasRole('admin') || Gate::allows('access-admin-panel');
        }
        // if ($panel->getId() === 'company') {
        //     return $this->hasRole('recruiter') || Gate::allows('access-company-panel');
        // }

        return false;
    }
}
