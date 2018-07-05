<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oder extends Model
{
    //
    protected $table ='oder';
	protected $guarded =[];
	public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
	public function oders_detail()
	{
		return $this->hasMany('App\Oders_detail','oder_id');
	}
}
