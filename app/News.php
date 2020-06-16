<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	protected $table ='news';
	protected $primaryKey='id';
    public function news()
    {
        return $this->hasOne('App\Link','id');
    }
	
	/*public function publishers()
    {
        return $this->hasMany('App\Publisher','id');
    }*/
	
	public function publish()
    {
        return $this->hasOne('App\Publish','id');
    }
	
	public $timestamps = false;
}
