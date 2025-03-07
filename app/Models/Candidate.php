<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Candidate extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $fillable = [
        'user_id',
        'location_id',
        'category_id',
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'profile_picture',
        'bio',
        'status',
        'current_salary',
        'is_paid_annually_monthly',
        'currency',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function educationDetails()
    {
        return $this->hasMany(EducationDetail::class);
    }

    public function experienceDetails()
    {
        return $this->hasMany(ExperienceDetails::class);
    }

    public function skillSets()
    {
        return $this->belongsToMany(SkillSet::class, 'candidate_skill_sets', 'candidate_id', 'skill_set_id')
            ->using(CandidateSkillSet::class)
            ->withPivot('skill_level', 'is_current')
            ->withTimestamps();
    }

    public function jobApplications()
    {
        return $this->belongsToMany(Job::class, 'job_applications', 'candidate_id', 'job_id')
            ->withPivot('status', 'cover_letter', 'resume', 'attachment', 'shortlisted_at', 'rejected_at', 'hired_at', 'applied_at')
            ->withTimestamps();
    }

    public function socialLinks()
    {
        return $this->morphMany(SocialLink::class, 'socialable');
    }
}
