<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    //
    protected $fillable = ['name','client','sale_type','date_registered','deal_status','review','user_id'];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
