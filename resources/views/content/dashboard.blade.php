@extends('index')

@section('content')
    <main role="main" class="container mt-4">
        <div class="card">
            <div class="card-header  text-center">
                Recent Task List
            </div>
            <div class="card-body">
                <p class="card-text">You have don't task created yet. <a href="{{route('createTask')}}">create one?</a></p>

            </div>
        </div>
    </main>
@endsection
