@extends('layouts.app')
@section('style')
    <style>

        /*================================
        Filter Box Style
        ====================================*/
        .job-box-filter label {
            width: 100%;
        }

        .job-box-filter select.input-sm {
            display: inline-block;
            max-width: 120px;
            margin: 0 5px;
            border: 1px solid #e8eef1;
            border-radius: 2px;
            height: 34px;
            font-size: 15px;
        }

        .job-box-filter label input.form-control {
            max-width: 200px;
            display: inline-block;
            border: 1px solid #e8eef1;
            border-radius: 2px;
            height: 34px;
            margin-left: 5px;
            font-size: 15px;
        }

        .text-right {
            text-align: right;
        }

        .job-box-filter {
            padding: 12px 15px;
            background: #ffffff;
            border-bottom: 1px solid #e8eef1;
            margin-bottom: 20px;
        }

        .job-box {
            background: #ffffff;
            display: inline-block;
            width: 100%;
            padding: 0 0px 40px 0px;
            border: 1px solid #e8eef1;
        }

        .job-box-filter a.filtsec {
            margin-top: 8px;
            display: inline-block;
            margin-right: 15px;
            padding: 4px 10px;
            font-family: 'Quicksand', sans-serif;
            transition: all ease 0.4s;
            background: #edf0f3;
            border-radius: 50px;
            font-size: 13px;
            color: #81a0b1;
            border: 1px solid #e2e8ef;
        }

        .job-box-filter a.filtsec.active {
            color: #ffffff;
            background: #16262c;
            border-color: #16262c;
        }

        .job-box-filter a.filtsec i {
            color: #03A9F4;
            margin-right: 5px;
        }

        .job-box-filter a.filtsec:hover, .job-box-filter a.filtsec:focus {
            color: #ffffff;
            background: #07b107;
            border-color: #07b107;
        }

        .job-box-filter a.filtsec:hover i, .job-box-filter a.filtsec:focus i {
            color: #ffffff;
        }

        .job-box-filter h4 i {
            margin-right: 10px;
        }

        /*=====================================
        Inbox Message Style
        =======================================*/
        .inbox-message ul {
            padding: 0;
            margin: 0;
        }

        .inbox-message ul li {
            list-style: none;
            position: relative;
            padding: 15px 20px;
            border-bottom: 1px solid #e8eef1;
        }

        .inbox-message ul li:hover, .inbox-message ul li:focus {
            background: #eff6f9;
        }

        .inbox-message .message-avatar {
            position: absolute;
            left: 30px;
            top: 50%;
            transform: translateY(-50%);
        }

        .message-avatar img {
            display: inline-block;
            width: 54px;
            height: 54px;
            border-radius: 50%;
        }

        .inbox-message .message-body {
            margin-left: 85px;
            font-size: 15px;
            color: #62748F;
        }

        .message-body-heading h5 {
            font-weight: 600;
            display: inline-block;
            color: #62748F;
            margin: 0 0 7px 0;
            padding: 0;
        }

        .message-body h5 span {
            border-radius: 50px;
            line-height: 14px;
            font-size: 12px;
            color: #fff;
            font-style: normal;
            padding: 4px 10px;
            margin-left: 5px;
            margin-top: -5px;
        }

        .message-body h5 span.unread {
            background: #07b107;
        }

        .message-body h5 span.important {
            background: #dd2027;
        }

        .message-body h5 span.pending {
            background: #2196f3;
        }

        .message-body-heading span {
            float: right;
            color: #62748F;
            font-size: 14px;
        }

        .messages-inbox .message-body p {
            margin: 0;
            padding: 0;
            line-height: 27px;
            font-size: 15px;
        }

        a:hover {
            text-decoration: none;
        }
    </style>

@endsection

@section('content')

    <div class="container">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Feature
                    </div>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="search" name="search" id="search" class="form-control"
                                   placeholder="Search Customer Data"/>
                            <div class="input-group-btn">

                            </div>
                        </div>
                        <hr>
                        <form>

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

                    <div class="alert alert-info alert-danger" id="myAlert">
                        <a href="#" class="close">&times;</a>
                        <strong>Success!</strong> This alert box could indicate a successful or positive action.
                    </div>

                </div>

                @foreach($users as $user)

                    {{--                    <div class="row justify-content-center">--}}
                    {{--                        <div class="col-sm">--}}
                    {{--                            <div class="card" style="border: none !important;">--}}
                    {{--                                <div class="card-body">--}}

                    {{--                                    <div class="media col-md">--}}
                    {{--                                        <a href="{{url('profile/'.$user->id)}}">--}}
                    {{--                                            <img class="align-self-start mr-3" style=" border: 1px solid #ddd;" width="130" height="130" src="{{asset('/images/profile/profile.png')}}" alt="Generic placeholder image">--}}
                    {{--                                        </a>--}}
                    {{--                                        <div class="media-body">--}}
                    {{--                                            <a href="{{url('profile/'.$user->id)}}">--}}
                    {{--                                            <h5 class="card-title"--}}
                    {{--                                                style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 16.1px; color: #002f34; text-transform: capitalize">--}}
                    {{--                                                <b>{{$user->name}}</b></h5></a>--}}

                    {{--                                            <div class="card-title text-muted" style="text-transform: capitalize; font-size: 11px" >--}}
                    {{--                                                <a href="{{url('category/'.$user->skill)}}">--}}
                    {{--                                                    <span style="margin-right: 7px;">{{$user->skill}}  </span>--}}

                    {{--                                                </a>--}}
                    {{--                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-geo-alt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
                    {{--                                                    <path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>--}}
                    {{--                                                </svg>--}}
                    {{--                                                <a href="#">--}}
                    {{--                                                    <span>{{$user->locally}}</span>--}}

                    {{--                                                </a>--}}
                    {{--                                                <a href="{{url('city/'.$user->city)}}">--}}
                    {{--                                                    <span>{{$user->city}}</span>--}}

                    {{--                                                </a>--}}

                    {{--                                               </div>--}}
                    {{--                                            <a class="link-text" href="{{url('profile/'.$user->id)}}">--}}
                    {{--                                                <p>Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>--}}
                    {{--                                            </a>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="text-right" style="height: 70px; width: 70px; border-radius: 140px;">--}}
                    {{--                                         <span>--}}
                    {{--                                    <img class="card-img ml-1 mr-1" style=" border: 1px solid #ddd;"--}}
                    {{--                                         src="{{asset('/images/profile/profile.png')}}" alt="Card image cap">--}}
                    {{--                                         </span>--}}
                    {{--                                    </div>--}}

                    {{--                                    <p class="card-title"--}}
                    {{--                                       style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 16.1px; color: #002f34; text-transform: uppercase">--}}
                    {{--                                        <b>{{$user->name}}</b>--}}
                    {{--                                        <br>plumber, Electration--}}
                    {{--                                    </p>--}}

                    {{--                                    <div class="media">--}}
                    {{--                                        <div class="media-body">--}}
                    {{--                                            <div class="text-right">--}}
                    {{--                                                <a href="{{url('profile/'.$user->id)}}" class="btn btn-primary">Go Porfile</a>--}}

                    {{--                                            </div>--}}

                    {{--                                        </div>--}}
                    {{--                                    </div>--}}


                    {{--                                    <div class=""></div>--}}

                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                    {{--                    </div>--}}

                    <div class="chat_container" style="background-color: #fff;">
                        <div class="inbox-message">
                            <ul>
                                <li>
                                    <div class="message-avatar">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                                    </div>
                                    <div class="message-body">
                                        <div class="message-body-heading">
                                            <a href="{{url('profile/'.$user->id)}}">
                                                <h5>{{$user->name}}</h5>
                                            </a>
                                            <a href="{{url('category/'.$user->skill)}}">
                                                <h5><span class="unread">{{$user->skill}}</span></h5>
                                            </a>
                                        </div>
                                        <p>Hello, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                            eiusmod tempor incididunt ut labore et dolor....</p>
                                        <span>{{$user->locally}},
                                             <a href="{{url('city/'.$user->city)}}"><span>{{$user->city}}</span></a>
                                        </span>
                                    </div>


                                </li>


                                {{--                                                --}}
                                {{--                                                <li>--}}
                                {{--                                                    <a href="#">--}}
                                {{--                                                        <div class="message-avatar">--}}
                                {{--                                                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">--}}
                                {{--                                                        </div>--}}
                                {{--                                                        <div class="message-body">--}}
                                {{--                                                            <div class="message-body-heading">--}}
                                {{--                                                                <h5>Daniel Dock <span class="unread">Unread</span></h5>--}}
                                {{--                                                                <span>7 hours ago</span>--}}
                                {{--                                                            </div>--}}
                                {{--                                                            <p>Hello, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolor....</p>--}}
                                {{--                                                        </div>--}}
                                {{--                                                    </a>--}}
                                {{--                                                </li>--}}
                            </ul>
                        </div>
                    </div>

                @endforeach
            </div>


        </div>
    </div>


@endsection

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        $(document).ready(function () {

            fetch_customer_data();

            function fetch_customer_data(query = '') {
                $.ajax({
                    url: "{{ route('live_search.search') }}",
                    method: 'GET',
                    data: {query: query},
                    dataType: 'json',
                    success: function (data) {
                        //console.log(data.table_data);
                        $('#initial_table').html(data.table_data);
                        //$('#total_records').text(data.total_data);
                    }
                })
            }

            $(document).on('keyup', '#search', function () {
                var query = $(this).val();

                fetch_customer_data(query);

            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $(".close").click(function () {
                $("#myAlert").alert("close");
            });
        });
    </script>

@endsection
