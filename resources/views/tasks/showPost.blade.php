
@foreach($tasks as $task)
<div class="panel panel-default">
	<div class="panel-heading">		
	    <h2>
	    	<a href="{{ route('tasks.show', $task->id) }}">
	    		{{ $task->title }}
	    	</a>    	
	    </h2> 
	    <h5> <small style="align:right">{{ $task->updated_at}}</small></h5>
	</div>
	<div class="panel-body">
	    <h4>
	    	{{ $task->description}}
	    	{!! link_to(route('tasks.show', $task->id), 'Read More') !!}

	    </br>

	    </h4>
	   
	</div>
</div>
@endforeach
{!! Form::close() !!}

<div align="center">{!! $tasks->render() !!}</div>
