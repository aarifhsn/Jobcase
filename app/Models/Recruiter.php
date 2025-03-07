<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recruiter extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'designation',
        'department',
        'phone',
        'email',
        'bio',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function socialLinks()
    {
        return $this->morphMany(SocialLink::class, 'socialable');
    }
}
