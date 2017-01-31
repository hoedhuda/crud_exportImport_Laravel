<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\TasksController;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    public static function valid() {
	    return array(
    	'description' => 'required'
	     );
	}

	public function comments() {
	   //return $this->hasMany('Comment');
	   return $this->hasMany('App\Comment', 'task_id');
	}
}
