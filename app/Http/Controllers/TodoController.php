<?php

namespace App\Http\Controllers;

use App\Repository\TaskRepository;
use Illuminate\Http\Request;
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
            return redirect()->route('dashboard');
        }else{
            throw new Exception('Failur saving task ');
        }
    }
}
