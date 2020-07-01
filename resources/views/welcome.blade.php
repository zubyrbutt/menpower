@extends('layouts.app')

@section('content')

    {{--    <div class="flex-center position-ref full-height">--}}
    {{--        @if (Route::has('login'))--}}
    {{--            <div class="top-right links">--}}
    {{--                @auth--}}
    {{--                    <a href="{{ url('/home') }}">Home</a>--}}
    {{--                @else--}}
    {{--                    <a href="{{ route('login') }}">Login</a>--}}

    {{--                    @if (Route::has('register'))--}}
    {{--                        <a href="{{ route('register') }}">Register</a>--}}
    {{--                    @endif--}}
    {{--                @endauth--}}
    {{--            </div>--}}
    {{--        @endif--}}

    <div class="container">

        <div class="row">
            <div class="col-md-8">

                @foreach($users as $user)

                    <div class="row justify-content-center" >
                        <div class="col-sm">
                            <div class="card mb-1">
                                <div class="card-body">

                                    <div class="text-right" style="height: 70px; width: 70px; border-radius: 140px;" >
                                         <span>
                                    <img class="card-img ml-1 mr-1" style=" border: 1px solid #ddd;"
                                         src="{{asset('/images/men.jpg')}}" alt="Card image cap">
                                         </span>
                                </div>

                                         <p class="card-title"
                                            style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 16.1px; color: #002f34; text-transform: uppercase">
                                        <b>{{$user->name}}</b>
                                        <br>plumber, Electration
                                    </p>

                                    <div class="text-right">
                                    <a href="{{url('profile/'.$user->id)}}" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                    <div class=""></div>
                                    <span style="text-transform: uppercase; font-size: 10px;">Rawalpindi, pakistan</span>
                                </div>
                            </div>
                        </div>

                    </div>
{{--                                        <div class="card p-2 m-1" style="width: 18rem;">--}}
{{--                                            <div class="row justify-content-center">--}}
{{--                                                <div class="" style="height: 70px; width: 70px; border-radius: 140px;">--}}
{{--                                                    <img class="card-img ml-3 mr-2" style=" border: 1px solid #ddd;"--}}
{{--                                                         src="{{asset('/images/men.jpg')}}" alt="Card image cap">--}}
{{--                                                </div>--}}
                    {{--                            <div class="card-body ml-1">--}}
                    {{--                                <p class="card-title"--}}
                    {{--                                   style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 16.1px; color: #002f34; text-transform: uppercase">--}}
                    {{--                                    <b>{{$user->name}}</b>--}}
                    {{--                                    <br>plumber, Electration--}}
                    {{--                                </p>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                    {{--                        <p class="card-text mt-5"--}}
                    {{--                           style="font-family: Arial, Helvetica, sans-serif; font-size: 10px; text-transform: uppercase; word-spacing: 0px;">--}}
                    {{--                            Dhok kala khan, Rawalpindi</p>--}}

                    {{--                    </div>--}}

                @endforeach
            </div>


            <div class="col">
                @auth
                <div class="form-group">
                    <label for="exampleFormControlTextarea1"><strong>Whatsup!</strong></label>
                    <textarea placeholder="write here .." class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="text-right">
                    <a href="#" class="btn btn-primary">Send</a>
                </div>

                @endauth
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        Feature--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <a href="#" class="card-link" style="color: #002f34">Top Elaborations</a><span class="badge badge-light">  10</span> <hr>--}}
{{--                        <a href="#" class="card-link" style="color: #002f34">Top Elaborations</a><span class="badge badge-light">  10</span> <hr>--}}
{{--                        <a href="#" class="card-link" style="color: #002f34">Top Elaborations</a><span class="badge badge-light">  10</span> <hr>--}}
{{--                        <a href="#" class="card-link" style="color: #002f34">Top Elaborations</a><span class="badge badge-light">  10</span>--}}

{{--                    </div>--}}
{{--                </div>--}}

            </div>

        </div>
    </div>


@endsection
