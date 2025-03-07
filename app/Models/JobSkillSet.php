<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class JobSkillSet extends Pivot
{
    protected $table = 'job_skill_sets';

    protected $fillable = ['job_id', 'skill_set_id', 'skill_level', 'is_required'];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function skillSet()
    {
        return $this->belongsTo(SkillSet::class);
    }
}
