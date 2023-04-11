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
        'cover_image',
        'date',
        'event_time',
        'short_description',
        'ticket_price',
        'director',
        'location',
        'slug_url',
        'presented_by',
        'event_type',
        'writer',
        'created_by',
        'modified_by',
        'created_ip_address',
        'modified_ip_address',
        'status'
    ];

    public function getEventImageAttribute($value){
        return Storage::url($value);
    }

    public function getCoverImageAttribute($value){
        return Storage::url($value);
    }

    public function theater()
    {
        return $this->belongsTo('App\Models\Theater');
    }
}
