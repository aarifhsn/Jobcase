<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CandidateSkillSet extends Pivot
{
    protected $table = 'candidate_skill_sets';

    protected $fillable = ['candidate_id', 'skill_set_id', 'skill_level', 'is_current'];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function skillSet()
    {
        return $this->belongsTo(SkillSet::class);
    }
}
