<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;
use Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Comment;
use App\Models\Rating;
use App\Models\Like;
use DB;
class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'blogs';

    protected $fillable = [
        'blog_title',
        'blog_description',
        'blog_image',
        'publish_date',
        'slug_url',
        'created_by',
        'user_id',
        'modified_by',
        'status'
    ];

    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($value){
        return date('Y-m-d H:i:s',strtotime($value));
    }

    public function getBlogImageAttribute($value){
        return Storage::url($value);
    }

    public function getBlogDescriptionAttribute($value){
        return  strip_tags($value);
    }


    public static function getBlogs($search_keyword, $order, $date) {
        $blogs = DB::table('blogs')->whereNull('deleted_at');

        if($search_keyword && !empty($search_keyword)) {
            $blogs->where(function($q) use ($search_keyword) {
                $q->where('blogs.blog_title', 'like', "%{$search_keyword}%")
                ->orWhere('blogs.blog_description', 'like', "%{$search_keyword}%");
            });
        }

        if($order && !empty($order)) {
            $blogs = $blogs->orderBy('blogs.id', $order);
        }

        if($date && !empty($date)) {
            $blogs = $blogs->where('blogs.publish_date', date('Y-m-d',strtotime($date)));
        }

        return $blogs->paginate(5);
    }

    public function comments(){
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }


   
}
