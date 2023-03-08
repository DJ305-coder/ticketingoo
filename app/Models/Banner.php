<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Storage;

class Banner extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'banners';

    protected $fillable = [
        'btn_title',
        'btn_url',
        'banner_image',
        'created_by',
        'modified_by',
    ];

    public function getBannerImageAttribute($value){
        return Storage::url($value);
    }
}
