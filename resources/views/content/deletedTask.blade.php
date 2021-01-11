@extends('index')

@section('content')
    <main role="main" class="container mt-4">
        <div class="card">
            <div class="card-header  text-center">
                Deleted Task
            </div>
            <div class="card-body">
                <div class="row">

                    @include('includes.list')

                        <div class="col-sm-4"> </div>
                        <div class="col-sm-4 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    {{$tasks->links()}}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4"> </div>
                </div>
            </div>
        </div>
    </main>
@endsection
