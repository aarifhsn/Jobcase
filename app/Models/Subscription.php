<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'start_date', 'end_date', 'status', 'plan', 'price', 'company_id', 'job_limit', 'description'];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active')
            ->where('end_date', '>', Carbon::now());
    }

    public function isExpired()
    {
        return $this->end_date < now();
    }
}
