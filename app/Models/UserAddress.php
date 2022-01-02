<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAddress extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'is_primary','dnd' ,'user_id','first_name','last_name','pincode','address','email','state_id','city_id','mobile' 
     ];


     public function get_state()
     {
         return $this->belongsTo('App\Models\State', 'state_id');
     }
 
 
     public function get_city()
     {
         return $this->belongsTo('App\Models\City', 'city_id');
     }
 
}
