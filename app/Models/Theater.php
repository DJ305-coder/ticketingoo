<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Theater extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'theaters';

    protected $fillable = [
        'theater_name',
        'theater_address',
        'map_url',
        'created_by',
        'modified_by',
    ];

    public function events()
    {
        return $this->hasMany('App\Models\Event');
    }
}
