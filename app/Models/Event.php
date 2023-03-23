<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;
class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'event_image',
        'date',
        'slug_url',
        'created_by',
        'modified_by',
        'created_ip_address',
        'modified_ip_address',
        'status'
    ];

    public function getEventImageAttribute($value){
        return Storage::url($value);
    }
}
