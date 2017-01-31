<p class="lead">Add new hoax info list below or import file 
	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">here</button>
</p>
@if ($message = Session::get('success'))
	<div class="alert alert-success" role="alert">
		{{ Session::get('success') }}
	</div>
@endif

@if ($message = Session::get('error'))
	<div class="alert alert-danger" role="alert">
		{{ Session::get('error') }}
	</div>
@endif
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
	   <!-- konten modal-->
	   <div class="modal-content">
	      <!-- heading modal -->
	      <div class="modal-header">
	         <button type="button" class="close" data-dismiss="modal">&times;</button>
	         <h4 class="modal-title">Import Hoax Posting</h4>
	      </div>
	      <!-- body modal -->
	      <div class="modal-body">
         	<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
				<input type="file" name="import_file" />
				{{ csrf_field() }}
				<br/>
			
	      </div>
	      <!-- footer modal -->
	      <div class="modal-footer">
	         <button class="btn btn-primary">Import CSV or Excel File</button>
	         </form>
	      </div>
	   </div>
	</div>
</div>