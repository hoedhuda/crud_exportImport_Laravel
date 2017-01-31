<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=[
    	'task_id',
    	'content',
    	'user'
    ];

    public static function valid (){
    	return array(
    		'content' => 'required'
    	);
    }

    public function task() {

    	//return $this->belongsTo('Task');
    	return $this->belongsTo('App\Task', 'task_id');

  	}
}
