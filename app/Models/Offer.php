<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    protected $table = 'offers';
    protected $fillable = ['id','name_en','name_ar','price_en','price_ar','details_en','details_ar','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
//    public $timestamps = false;
}
