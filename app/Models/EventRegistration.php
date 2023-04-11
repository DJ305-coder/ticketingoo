<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PaytmWallet;
class EventRegistration extends Model
{
    use HasFactory;
    protected $table = 'event_registration';


    protected $fillable = ['name','mobile_no','address','status','fee','event_id','email','order_id','transaction_id'];


    /* 
		status : 0 => progress, 1 => Fail, 2 => Successful
    */
}
