<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobView extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'job_id',
        'user_id',
        'viewed_at',
        'ip_address',
        'user_agent',
        'details',
        'view_count',
    ];

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

    public function scopeViewedAt($query, $viewed_at)
    {
        return $query->where('viewed_at', $viewed_at);
    }

    public function scopeIpAddress($query, $ip_address)
    {
        return $query->where('ip_address', $ip_address);
    }

    public function scopeViewCount($query, $view_count)
    {
        return $query->where('view_count', $view_count);
    }

    public function scopeViewedBetween($query, $start, $end)
    {
        return $query->whereBetween('viewed_at', [$start, $end]);
    }

    public function scopeViewCountBetween($query, $start, $end)
    {
        return $query->whereBetween('view_count', [$start, $end]);
    }

    public function scopeOrderByViewCount($query, $order = 'desc')
    {
        return $query->orderBy('view_count', $order);
    }
}
