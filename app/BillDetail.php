<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    //
    protected $table = "bill_detail";

    public function bills()
    {
    	return $this->belongsTo('App\Bills','id_bill','id');
    }

    public function product()
    {
    	return $this->belongsTo('App\Product','id_product','id');
    }
    
}
