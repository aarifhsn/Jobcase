<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'slug', 'content', 'image', 'status'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->title) . '-' . uniqid();
        });

        static::updating(function ($post) {
            if (!$post->isDirty('slug')) {
                $post->slug = Str::slug($post->title) . '-' . uniqid();
            }
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
