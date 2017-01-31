
{!! Form::open([
    'route' => 'tasks.store'
]) !!}

@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
<div class="panel panel-default">
  <div class="panel-body">
  	<div class="form-group">
	    {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
	    {!! Form::text('title', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
	    {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
	    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
	</div>
	  {!! Form::submit('Create New Post', ['class' => 'btn btn-primary']) !!}

	
  </div>
</div>

{!! Form::close() !!}