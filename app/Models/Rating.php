<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;
class Rating extends Model
{
    use HasFactory;

    protected $table = 'rating';

    protected $fillable = [
        'rating',
        'blog_id',
        'user_id',
    ];

    public function blog(){
        return $this->belongsTo(Blog::class);
    }

}
