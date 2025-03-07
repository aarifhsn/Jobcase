<?php

namespace App\Models;

use App\Constant\JobConstant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'company_jobs';

    protected $fillable = [
        'company_id',
        'category_id',
        'created_by',
        'title',
        'description',
        'experience',
        'slug',
        'vacancy',
        'location',
        'salary_range',
        'application_link',
        'application_email',
        'application_phone',
        'start_date',
        'expiration_date',
        'status',
        'duration',
        'location_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'job_tags');
    }

    public function jobClicks()
    {
        return $this->hasMany(JobClick::class);
    }

    public function jobViews()
    {
        return $this->hasMany(JobView::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function skillSets()
    {
        return $this->belongsToMany(SkillSet::class, 'job_skill_sets', 'job_id', 'skill_set_id')
            ->withPivot('skill_level', 'is_required')
            ->withTimestamps();
    }

    public function applicants()
    {
        return $this->belongsToMany(Candidate::class, 'job_applications', 'job_id', 'candidate_id')
            ->withPivot('status', 'cover_letter', 'resume', 'attachment', 'shortlisted_at', 'rejected_at', 'hired_at', 'applied_at')
            ->withTimestamps();
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getStatusAttribute($value)
    {
        if ($this->expiration_date < now()) {
            $value = JobConstant::STATUS_EXPIRED;
        }
        return $value;
    }

    public function scopeActive($query)
    {
        return $query->where('status', JobConstant::STATUS_ACTIVE);
    }

    public function scopeExpired($query)
    {
        return $query->where('status', JobConstant::STATUS_EXPIRED);
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeSearch($query, $term)
    {
        return $query->where('title', 'like', '%' . $term . '%')
            ->orWhereHas('company', function ($q) use ($term) {
                $q->where('name', 'like', '%' . $term . '%');
            });
    }

    public function scopeFilterByCountry($query, $country)
    {
        return $query->whereHas('location', function ($q) use ($country) {
            $q->where('country', $country);
        });

        return $query;
    }

    public function scopeFilterByLocation($query, $state)
    {
        return $query->whereHas('location', function ($q) use ($state) {
            $q->where('state', $state)
                ->orWhere('city', $state)
                ->orWhere('country', $state)
                ->orWhere('zip', $state)
                ->orWhere('name', $state)
                ->orWhere('address', $state)
                ->orWhere('latitude', $state)
                ->orWhere('longitude', $state);
        });

        return $query;
    }

    public function scopeFilterByCompany($query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }
}
