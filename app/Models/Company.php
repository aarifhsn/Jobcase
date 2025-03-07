<?php

namespace App\Models;

use App\Models\User;
use App\Constant\CompanyConstant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\CompanyCreatedNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'email',
        'contact_number',
        'industry',
        'website',
        'logo',
        'description',
        'status',
        'user_id',
        'location_id',
        'recruiter_id',
        'user_id',
    ];

    public function socialLinks()
    {
        return $this->morphMany(SocialLink::class, 'socialable');
    }


    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function experiences()
    {
        return $this->hasMany(ExperienceDetails::class);
    }

    public function recruiter()
    {
        return $this->belongsTo(Recruiter::class);
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
