<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
	protected $table = "comment";
	protected $primaryKey = "id";
	public function users()
    {
        return $this->hasMany('App\User');
    }
	
	public function readcomment()
    {
        return $this->hasOne('App\ReadComment','id');
    }
	
	public $timestamps = false;
}
