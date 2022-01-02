<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable=['code','type','value','status','distributor_id','dealer_id'];

    public static function findByCode($code){
        return self::where('code',$code)->first();
    }

    public function distributor(){
        return $this->belongsTo('App\Models\Distributor\Distributor','distributor_id');
    }

    public function dealer(){
        return $this->belongsTo('App\Models\Distributor\Dealer','dealer_id');
    }

    public function discount($total){
        if($this->type=="fixed"){
            return $this->value;
        }
        elseif($this->type=="percent"){
            return ($this->value /100)*$total;
        }
        else{
            return 0;
        }
    }
}
