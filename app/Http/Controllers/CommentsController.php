<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Comment;
use Session;
use Redirect;
use App\Comments, App\Task;

class CommentsController extends Controller
{
    public function store(Request $request){
      
    	/*
    	$comments = new Comment();
            $comments->task_id = $request->task_id;
            $comments->content = $request->content;
            $comments->user = $request->user;
            $comments->save();
            return response ()->json ( $comments );
        */

    	
      $validate = Validator::make($request->all(), 
      Comment::valid());
      if($validate->fails()) {
        return Redirect::to('tasks/'. $request->task_id)
          ->withErrors($validate)
          ->withInput();
      } else {
        Comment::create($request->all());
        //$task = Task::findOrFail($id);
        Session::flash('notice', 'Success add comment');
        //return Redirect::to('tasks/', $task->id);
        return redirect()->back();
      }
     
    }
}
