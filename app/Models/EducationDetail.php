<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EducationDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'candidate_id',
        'location_id',
        'degree_name',
        'institution_name',
        'study_group',
        'major',
        'department',
        'education_level',
        'result',
        'cgpa',
        'percentage',
        'is_currently_studying',
        'start_date',
        'end_date',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
