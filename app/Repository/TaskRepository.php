<?php


namespace App\Repository;


use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskRepository
{

    public function getTaskOfCurrentUsre(){
        $userId = Auth::id();
        $tasks = Task::where('user_id',$userId)->get();
        return $tasks;
    }

}
