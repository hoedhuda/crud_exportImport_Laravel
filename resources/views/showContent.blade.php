@extends("layouts.application")

@section("content")
					<table class="table table-striped" id="table">
						<tr>
							<th>Judul</th>
							<th>Deskripsi</th>
						</tr>
						@foreach($dataImport as $crud)
						<tr class="item{{$crud->id}}">
							<td>{{$crud->title}}</td>
							<td>{{$crud->description}}</td>
							
						</tr>
						@endforeach
					</table>

@endsection	