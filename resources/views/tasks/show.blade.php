@extends('layouts.application')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">		
	    <h2>
	    	{{ $task->title }}	    	    	
	    </h2> 
	    <h5> <small style="align:right">{{ $task->updated_at}}</small></h5>
	</div>
	<div class="panel-body">
	    <h4>
	    	{{ $task->description}}	    	
	    </br>

	    <div class="col-lg-3">
	    	@include("tasks.comment")
	    </div>	
	    </h4>
	    <div class="col-lg-4">
	    </div>	
		<div class="col-lg-3">
		 	<div class="dropdown">
				<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Download Post
			  		<span class="caret"></span>
				</button>
			  	<ul class="dropdown-menu">		  		
				    <li>	
				    	<a href="{{ url('downloadExcel/xls/'.$task->id) }}"><button class="btn btn-success btn-lg">Download Excel xls</button></a>
				    </li>
				    <li>
				    	<a href="{{ url('downloadExcel/xlsx/'.$task->id) }}"><button class="btn btn-success btn-lg">Download Excel xlsx</button></a>
					</li>
				    <li>
				    	<a href="{{ url('downloadExcel/csv/'.$task->id) }}"><button class="btn btn-success btn-lg">Download CSV</button></a>
					</li>
				    <li>
				    	<a href="{{ url('downloadExcel/pdf/'.$task->id) }}"><button class="btn btn-success btn-lg">Download PDF</button></a>
					</li>
				    
			  	</ul>
			</div>
		</div>
		<div class="col-lg-2">			
			<div class="dropdown">
				<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">More
			  		<span class="caret"></span>
				</button>
			  	<ul class="dropdown-menu">		  		
				    <li>	
				    	{!! Form::open(['url'=>'/tasks/'.$task->id, 'class'=>'pull-center']) !!}
	                      {!! Form::hidden('_method', 'DELETE') !!}
	                      {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick'=>'return confirm(\'Are you sure?\')']) !!}
	                   {!! Form::close() !!}
				    </li>
				    <li>
				    	<a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit Task</a>
				    </li>
				    
			  	</ul>
			</div>
		</div>	
		<!--
		 <button class="btn btn-primary" data-toggle="collapse" data-target="#demo">Collapsible</button>
			<div id="demo" class="collapse">
				Lorem ipsum dolor text....
			</div> 
		-->
	    <hr>
	 <section class="comments">
        <header>
            <h3>Comments</h3>
        </header>
        @foreach($comments as $comment)
			<div class="row">
            	<div class="col-xs-12">    
			      <blockquote>{!! $comment->content !!}</blockquote>
			      <i>{!! $comment->user !!} - {!! $comment->updated_at !!}</i>
		    	</div>
		    </div>

		@endforeach        
    </section>	   

     
	</div>
</div>
<center>
<a href="{{ route('tasks.index') }}" class="btn btn-info">Back to all tasks</a>
</center>

@stop