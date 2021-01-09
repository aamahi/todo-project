<?php


namespace App\Repository;


use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Util\Exception;

class TaskRepository
{

    public function getTaskOfCurrentUsre(){
        $userId = Auth::id();
        $tasks = Task::where('user_id',$userId)->get();
        return $tasks;
    }
    public function createTask($task){

        $userId = Auth::User()->id;

        $end_time = (New \DateTime($task['end_time']))->format('Y-m-d h:i:s');
        $task = Task::create([
            'name'=>$task['name'],
            'description'=>$task['description'],
            'endtime'=>$end_time,
            'user_id'=>$userId,
        ]);
        if(!$task){
            throw new Exception('Failur saving task ');
        }
        return $task;
    }

}
