<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Blog;
use Carbon\Carbon;
class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'blog_id', 'parent_id', 'comment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function blog(){
        return $this->belongsTo(Blog::class);
    }

    public function replies(){
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function getCreatedAtAttribute($value){

        // Set the syntax for negative time differences to "N time unit before"
        $syntax = [
            'before' => '%s before',
            'after' => 'in %s',
        ];

        // Use the short version of the time unit names (e.g. "d" for "day")
        $shortUnits = true;

        $createdAt = Carbon::parse($value);

        // Get the current time
        $currentTime = Carbon::now();

        // Format the `created_at` date as a relative time string based on the current time
        $relativeTime = $createdAt->diffForHumans($currentTime, $shortUnits, $syntax);

        return $relativeTime.' ago';

    }

}
