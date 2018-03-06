<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    //
    protected $table = "bills";

    public function customer()
    {
    	//return $this->hasMany( ‘TenModel’ , ‘KhoaPhu’, ‘KhoaChinh’ );
    	return $this->belongsTo('App\Customer','id_customer','id');
    }
    public function  billdetail()
    {
    	return $this->hasMany('App\BillDetail','id_bill','id');
    }
}
