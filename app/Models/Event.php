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
        'theater_id',
        'description',
        'event_image',
        'date',
        'slug_url',
        'presented_by',
        'event_type',
        'writer_and_directers',
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
