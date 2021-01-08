<?php

namespace App\Http\Controllers;

use App\Repository\TaskRepository;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    private $taskRepository;
    public function __construct(TaskRepository $taskRepository)
    {
        $this->middleware('auth');
        $this->taskRepository = $taskRepository;
    }

    public function dashboard(){

        return view('content.dashboard');
    }

    public function list(){
        $tasks =  $this->taskRepository->getTaskOfCurrentUsre();
        return view('content.list',compact('tasks'));
    }

    public function create(){
        return view('content.create');
    }
    public function saveTask(){

    }
}
