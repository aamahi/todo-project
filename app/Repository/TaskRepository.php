<?php


namespace App\Repository;


use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Util\Exception;

class TaskRepository
{

    public function getTaskOfCurrentUsre(){
        $userId = Auth::id();
        $tasks = Task::where('user_id',$userId)
            ->orderBy('id','desc')
            ->simplePaginate(6);
        return $tasks;
    }
    public function getTaskCountOfCurrentUser(){
        return count($this->getTaskOfCurrentUsre());
    }
    public function getRecentTaskOfCurrentUser($noOfTask = 6){
        $userId = Auth::user()->id;
        return Task::where('user_id',$userId)
            ->orderBy('endtime','asc')
//            ->whereDate('endtime' ,'>', new \DateTime())
            ->take($noOfTask)
            ->get();
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
