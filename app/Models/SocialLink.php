<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialLink extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['platform', 'url'];

    public function socialable()
    {
        return $this->morphTo();
    }
}
