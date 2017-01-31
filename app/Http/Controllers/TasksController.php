<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Input;
//use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Task;
//use App\Comment;
use Session;
use Excel;
use DB;
use File;
use Input;


class TasksController extends Controller
{
    public function index(){
	    $tasks = Task::paginate(5);

	    return view('tasks.index')->with('tasks',$tasks);
	}

    public function create(){
    	return view('tasks.create');
	}

	public function store(Request $request){
	    $this->validate($request, [
		    'title' => 'required',
		    'description' => 'required'
		]);

	    $input = $request->all();

	    Task::create($input);

	    Session::flash('flash_message', 'Task successfully added!');


	    return redirect()->back();
	}

	public function show($id){
		$task = Task::findOrFail($id);
	    $comments = Task::find($id)->comments->sortBy('Comment.created_at');

	    $data = DB::table('comments as comm')
				->join('tasks', 'comm.task_id', '=', 'tasks.id')
				->where('task_id', '=', 3)
				->select('comm.id', 'comm.task_id', 'tasks.title', 'tasks.description', 'comm.content', 'comm.user')
				->get();
	    
	    return view('tasks.show')
	      ->with('task', $task)
	      ->with('comments', $comments)
	      ->with('data', $data);
		
	}

	public function edit($id){
		$task = Task::findOrFail($id);
	    return view('tasks.edit')->with('task', $task);
	}
	public function update($id, Request $request){
	    $task = Task::findOrFail($id);

	    $this->validate($request, [
	        'title' => 'required',
	        'description' => 'required'
	    ]);

	    $input = $request->all();

	    $task->fill($input)->save();

	    Session::flash('flash_message', 'Task successfully added!');

	    return redirect('/');
	}

	public function destroy($id){
	    $task = Task::findOrFail($id);

	    $task->delete();

	    Session::flash('flash_message', 'Task successfully deleted!');

	    return redirect()->route('tasks.index');
	}

//=======IMPORT/EXPORT EXCEL FILE==============

	public function importExport()

	{
		$dataImport = Task::all();
		return view('importExport', compact('dataImport'));

	}


	/**

     * File Export Code

     *

     * @var array

     */

	public function downloadExcel(Request $request, $type, $id)

	{

		//$data = Task::get()->toArray();
		$task = DB::table('comments as comm')
				->join('tasks', 'comm.task_id', '=', 'tasks.id')
				->where('task_id', '=', $id)
				->select('comm.id', 'comm.task_id', 'tasks.title', 'tasks.description', 'comm.content', 'comm.user')
				->get();

		$task = collect($task)->map(function($x){ return (array) $x; })->toArray(); 

		//$data = collect($colek);
		//$data = $datae->toArray();

				//SELECT comments.id, comments.task_id, tasks.title, tasks.description, comments.content, comments.user FROM comments, tasks WHERE tasks.id = comments.task_id AND comments.task_id = 1 

		return Excel::create('ExportExcel', function($excel) use ($task) {

			$excel->sheet('mySheet', function($sheet) use ($task)

	        {

				$sheet->fromArray($task);

	        });

		})->download($type);

	}


	/**

     * Import file into database Code

     *

     * @var array

     */

	public function importExcel(Request $request)

	{


		if($request->hasFile('import_file')){
			$path = $request->file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {})->get();
			/*$data = Excel::load($path, function($reader) {
				\App\Task::insert($reader->toArray());
			});
			*/
			$extension = Input::file('import_file')->getClientOriginalExtension();
			
			if(!empty($data) && $data->count()){
				if(!empty($extension) && $extension == 'ods'){
					// .ods
					foreach ($data->toArray() as $key => $value) {
						if(!empty($value)){
							foreach ($value as $v) {		
								$insert[] = ['title' => $v['title'], 'description' => $v['description'], 'created_at' => $v['created_at'], 'updated_at' => $v['updated_at']];
							}
						}
					}
				}else{
					//.xls
					foreach ($data->toArray() as $key => $value) {
						$insert[] = ['title' => $value['title'], 'description' => $value['description'], 'created_at' => $value['created_at'], 'updated_at' => $value['updated_at']];
					}
				}					

				if(!empty($insert)){

					Task::insert($insert);

					return back()->with('success','Insert Record successfully.');

				}


			}


		}


		return back()->with('error','Please Check your file, Something is wrong there.');

	}


}	
