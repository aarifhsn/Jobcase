<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'address',
        'city',
        'state',
        'country',
        'zip',
        'latitude',
        'longitude'
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function educationDetails()
    {
        return $this->hasMany(EducationDetail::class);
    }

    public function experienceDetails()
    {
        return $this->hasMany(ExperienceDetails::class);
    }

    public function getCoordinatesAttribute()
    {
        return $this->latitude . ',' . $this->longitude;
    }
}
