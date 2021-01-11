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
                    <a href="#" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                @endif

                    <a href="{{route('softDelete',$task->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
            </div>
        </div>
    </div>
@empty
    <p class="card-text">You have don't task created yet. <a href="{{route('createTask')}}">create one?</a></p>

@endforelse
