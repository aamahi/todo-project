@extends('index')

@section('content')
    <main role="main" class="container mt-4">
        <div class="card">
            <div class="card-header  text-center">
                Recent Task List
            </div>
            <div class="card-body">
                <div class="row">

                    @include('includes.list')

                </div>
            </div>
        </div>
    </main>
@endsection
