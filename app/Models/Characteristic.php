<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    protected $fillable=['name',	'content'	,'sort_order',	'status'];
}
