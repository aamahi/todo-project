<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Repository\TaskRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Util\Exception;

class TodoController extends Controller
{
    private $taskRepository;
    public function __construct(TaskRepository $taskRepository)
    {
        $this->middleware('auth');
        $this->taskRepository = $taskRepository;
    }

    public function dashboard(){
        $tasks = $this->taskRepository->getRecentTaskOfCurrentUser(6);
        return view('content.dashboard',compact('tasks'));
    }

    public function tasks(){
        $tasks =  $this->taskRepository->getTaskOfCurrentUsre();
        return view('content.tasks',compact('tasks'));
    }

    public function create(){
        return view('content.create');
    }
    public function saveTask(Request $request){
        $this->validate($request,[
            'name'=>'required|max:255',
            'description'=>'string|Nullable',
            'end_time'=>'required|after:today',
        ]);
        $saveTask = $this->taskRepository->createTask($request->except('_token'));
        if($saveTask){
            return redirect()->route('tasks');
        }else{
            throw new Exception('Failur saving Taksk ');
        }
    }
    public function softdelete($id){
        Task::findOrFail($id)->delete();
        return redirect()->back();
    }
    public function deletedTask(){
        $tasks = $this->taskRepository->getDeletedTaskOfCurrentUser();
        return view('content.deletedTask',compact('tasks'));
    }

    public function restoreTask($id){
        Task::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('tasks');
    }
    public function hardDeleteTask($id){
        Task::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('deletedTask');
    }
    public function editTask($id){
        $task = Task::find($id);
        return view('content.editTask',compact('task'));
    }
    public function updateTask(Request $request,$id){
       return $request->all();
    }

}
