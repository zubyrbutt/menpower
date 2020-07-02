@extends('layouts.app')
@section('style')
    <style>
        .link-text {
            color: #002f34;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            line-height: 16.1px;
        }
    </style>

@endsection

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
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Feature
                    </div>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
                            <div class="input-group-btn">

                            </div>
                        </div><hr>
                        <form >

                            <div class="search-card" id="initial_table">

                            </div>
                            <div class="search-card" id="ajax">

                            </div>

                        </form>

                    </div>
                </div>
                @auth
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"><strong>Whatsup!</strong></label>
                        <textarea placeholder="write here .." class="form-control" id="exampleFormControlTextarea1"
                                  rows="3"></textarea>
                    </div>
                    <div class="text-right">
                        <a href="#" class="btn btn-primary">Send</a>
                    </div>

                @endauth


            </div>
            <div class="col-md-8">
                <div class="mb-3">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-primary" style="color: #fff" type="submit">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                @foreach($users as $user)

                    <div class="row justify-content-center">
                        <div class="col-sm">
                            <div class="card mb-1">
                                <div class="card-body">

                                    <div class="text-right" style="height: 70px; width: 70px; border-radius: 140px;">
                                         <span>
                                    <img class="card-img ml-1 mr-1" style=" border: 1px solid #ddd;"
                                         src="{{asset('/images/profile/profile.png')}}" alt="Card image cap">
                                         </span>
                                    </div>

                                    <p class="card-title"
                                       style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 16.1px; color: #002f34; text-transform: uppercase">
                                        <b>{{$user->name}}</b>
                                        <br>plumber, Electration
                                    </p>

                                    <div class="text-right">
                                        <a href="{{url('profile/'.$user->id)}}" class="btn btn-primary">Go Porfile</a>
                                    </div>
                                    <div class=""></div>
                                    <span
                                        style="text-transform: uppercase; font-size: 10px;">Rawalpindi, pakistan</span>
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


        </div>
    </div>


@endsection

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        $(document).ready(function(){

            fetch_customer_data();

            function fetch_customer_data(query = '')
            {
                $.ajax({
                    url:"{{ route('live_search.search') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data)
                    {
                        console.log(data.table_data);
                        $('#initial_table').html(data.table_data);
                        //$('#total_records').text(data.total_data);
                    }
                })
            }

            $(document).on('keyup', '#search', function(){
                var query = $(this).val();

                fetch_customer_data(query);

            });
        });
    </script>

@endsection
