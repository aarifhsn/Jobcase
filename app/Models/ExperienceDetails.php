<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExperienceDetails extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'experience_details';

    protected $fillable = [
        'candidate_id',
        'company_id',
        'location_id',
        'company_name',
        'job_title',
        'description',
        'start_date',
        'end_date',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
