<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
	protected $table = 'link';
	protected $primaryKey='id';
    public function links()
    {
        return $this->hasMany('App\News','id');
    }
	
	public $timestamps = false;
}
