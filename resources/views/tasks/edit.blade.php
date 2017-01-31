@extends('layouts.application')

@section('content')

<h1>Edit Task - Task Name </h1>
<p class="lead">Edit this task below. <a href="{{ route('tasks.index') }}">Go back to all tasks.</a></p>
<hr>

{!! Form::model($task,['url' => '/tasks/'.$task->id, 'method' => 'PUT', 'files'=>true]) !!}

<div class="form-group">
    {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Update Task', ['class' => 'btn btn-primary']) !!}
 <button type="submit" class="btn btn-primary">Save</button>
      <a href="{{ url('/tasks') }}" class="btn btn-warning">Cancel</a>

{!! Form::close() !!}
@stop