<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SkillSet extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description'];

    public function candidates()
    {
        return $this->belongsToMany(Candidate::class, 'candidate_skill_sets', 'skill_set_id', 'candidate_id')
            ->using(CandidateSkillSet::class)
            ->withPivot('skill_level', 'is_current')
            ->withTimestamps();
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_skill_sets', 'skill_set_id', 'job_id')
            ->withPivot('skill_level', 'is_required')
            ->withTimestamps();
    }
}
