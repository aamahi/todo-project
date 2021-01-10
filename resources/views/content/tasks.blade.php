@extends('index')

@section('content')
    <main role="main" class="container mt-4">
        <div class="card">
            <div class="card-header  text-center">
                All Task List
            </div>
            <div class="card-body">
                <div class="row">
                    @forelse($tasks as $task)
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{$task->name}}</h5>
                                    <p class="card-text">{{$task->description}}</p>
                                    <p class="card-text">{{$task->endtime}}</p>
                                    <a href="#" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p class="card-text">You have don't task created yet. <a href="{{route('createTask')}}">create one?</a></p>

                    @endforelse
                        <div class="col-sm-4">

                        </div>
                        <div class="col-sm-4 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    {{$tasks->links()}}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                        </div>
                </div>
            </div>
        </div>
    </main>
@endsection
