@extends('layouts.application')

@section('content')


{!! Form::open([
			'route' => 'comments.store'
		]) !!}
			
		<button type="button" class="btn btn-primary btn-right" data-toggle="modal" data-target="#commente">Post Comment</button>

		<div id="commente" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
			   <!-- konten modal-->
				<div class="modal-content">
			    	<!-- heading modal -->
			      	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal">&times;</button>
			         	<h4 class="modal-title">Create Comment</h4>
			      	</div>	
			      	<!-- body modal -->
			      	<div class="modal-body">
		         			<div class="form-group">
					    	{!! Form::text('task_id', $value = $task->id, array('class' => 'form-control', 'readonly')) !!}
						</div>
					  	<div class="clear"></div>
						
						<div class="form-group">
							{!! Form::label('content', 'Content', array('class' => 'col-lg-3 control-label')) !!}
  					    	{!! Form::text('content', null, array('class' => 'form-control','placeholder' =>'Content', 'rows' => 10, 'autofocus' => 'true')) !!}
					    	{!! $errors->first('content') !!}					  	
					  	<div class="clear"></div>
						</div>
						<div class="form-group">
					    	{!! Form::label('user', 'User', array('class' => 'col-lg-3 control-label')) !!}
  							{!! Form::text('user', null, array('class' => 'form-control', 'placeholder' =>'User')) !!}
					  		<div class="clear"></div>
						</div>				
	  		    	</div>
			      <!-- footer modal -->
			    	<div class="modal-footer">
			         	<div class="form-group">				  		
					  		<div class="col-lg-9"> </div>
					  		<div class="col-lg-3">
					    	{!! Form::submit('Save', array('class' => 'btn btn-primary btn-right')) !!}
					  		</div>
					  		<div class="clear"></div>
						</div>
				  	</div>
			   	</div>
			</div>
		</div>				

@stop