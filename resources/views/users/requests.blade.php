@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
    @include('layouts.partials')
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        @foreach($users as $user)
                            {{$user->name}}
                            @endforeach
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>



@endsection
