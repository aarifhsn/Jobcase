<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobClick extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['job_id', 'user_id', 'ip_address', 'user_agent', 'details', 'click_count', 'clicked_at', 'referer'];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeJobId($query, $job_id)
    {
        return $query->where('job_id', $job_id);
    }

    public function scopeUserId($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }

    public function scopeIpAddress($query, $ip_address)
    {
        return $query->where('ip_address', $ip_address);
    }

    public function scopeClickCount($query, $click_count)
    {
        return $query->where('click_count', $click_count);
    }

    public function scopeClickedAt($query, $clicked_at)
    {
        return $query->where('clicked_at', $clicked_at);
    }

    public function scopeReferer($query, $referer)
    {
        return $query->where('referer', $referer);
    }

    public function scopeClickedBetween($query, $start, $end)
    {
        return $query->whereBetween('clicked_at', [$start, $end]);
    }
}
