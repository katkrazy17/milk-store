<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='product'; // ke thua table
    // xac dinh cac column trong table
    protected $fillable = [];
    //khong thay doi thong tin timestamps
    //public $timestamps=false;

    public function category()
	{
		return $this->belongsTo('App\Category','category_id');
	}
    public function product_detail()
    {
        return $this->hasOne('App\Product_detail','product_id');
    }
	
}
