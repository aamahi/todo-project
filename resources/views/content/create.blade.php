@extends('index')

@section('content')
    <div class="row">
         <div class="col-md-6 offset-md-3">
        <main role="main" class="" style="margin-top: 80px;">

        <div class="card mt-4">
            <div class="card-header">
              Create a New Task
            </div>
            <div class="card-body">
                @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible" role="alert">
                        {{$error}}

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endforeach
                <form method="post" action="{{route('saveTask')}}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Task Name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea rows="4" class="form-control" id="description" name="description" placeholder="Enter Task Description 3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="end_time">End Time</label>
                        <input type="datetime-local" class="form-control" id="end_time" name="end_time" placeholder="Enter Task Name">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </main>
    </div>
    </div>
@endsection
