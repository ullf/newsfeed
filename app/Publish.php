<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publish extends Model
{
    protected $table = 'publish';
	protected $primeryKey = 'id';
	
	protected $fillable = [
		'publisherid', 'newsid',
	];
	
	public function news()
    {
        return $this->hasMany('App\News','id');
    }
	
	public function publishers()
    {
        return $this->hasMany('App\Publisher','id');
    }
	
	public $timestamps = false;
}
