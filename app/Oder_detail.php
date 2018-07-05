<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oder_detail extends Model
{
    //
    protected $table ='oder_detail';
	protected $guarded =[];

	public function oder()
    {
        return $this->belongsTo('App\Oder','oder_id');
    }

    public function product()
    {
        return $this->hasMany('App\Product','product_id');
    }
}
