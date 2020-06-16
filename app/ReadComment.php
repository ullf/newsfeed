<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReadComment extends Model
{
    protected $table = 'readcomment';
	protected $primeryKey = 'id';
	
	protected $fillable = [
		'userid', 'commentid',
	];
	
	public function users()
    {
        return $this->hasMany('App\User','id');
    }
	
	public function comments()
    {
        return $this->hasMany('App\Comment','id');
    }
	
	public $timestamps = false;
}
