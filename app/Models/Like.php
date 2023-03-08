<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;
class Like extends Model
{
    use HasFactory;

    protected $table = 'likes';

    protected $fillable = [
        'like',
        'blog_id',
        'user_id',
    ];

    public function blog(){
        return $this->belongsTo(Blog::class);
    }
}
