<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobApplication extends Pivot
{
    use SoftDeletes;

    protected $table = 'job_applications';

    protected $fillable = [
        'job_id',
        'candidate_id',
        'status',
        'cover_letter',
        'resume',
        'attachment',
        'shortlisted_at',
        'rejected_at',
        'hired_at',
        'applied_at',
    ];

    protected $casts = [
        'shortlisted_at' => 'datetime',
        'rejected_at' => 'datetime',
        'hired_at' => 'datetime',
        'applied_at' => 'datetime',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
