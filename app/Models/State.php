<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //

    protected $fillable = ['name','country_id','country_code','fips_code','iso2','latitude','longitude','status','wikiDataId'];


}
