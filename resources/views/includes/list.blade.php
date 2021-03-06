@forelse($tasks as $task)
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$task->name}}</h5>
                <p class="card-text">{{$task->description}}</p>
                <p class="card-text">{{$task->endtime}}</p>

                @if($task->deleted_at)
                    <a href="{{route('restoreTask',$task->id)}}" class="btn btn-info"><i class="fa fa-arrow-left"></i> Restore</a>
                @else
                    <a href="{{route('editTask',$task->id)}}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                @endif
                @if($task->deleted_at)
                    <a href="{{route('hardDeleteTask',$task->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                @else
                    <a href="{{route('softDelete',$task->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                @endif

            </div>
        </div>
    </div>
@empty
{{--    @if($task->delete_at)--}}
{{--        <p class="card-text">No Deleted Task Yet !!</p>--}}
{{--    @else--}}
    <p class="card-text">You have don't task created yet. <a href="{{route('createTask')}}">create one?</a></p>
{{--    @endif--}}
@endforelse
