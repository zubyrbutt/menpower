@extends('layouts.app')
@section('style')
    <style>
        .card {
            margin-bottom: 35px;
            /*box-shadow: 0 10px 20px 0 rgba(26, 44, 57, 0.14);*/
            border: none;
        }

        .follower-wrapper li {
            list-style-type: none;
            color: #fff;
            display: inline-block;
            float: left;
            margin-right: 20px;
        }

        .social-profile {
            color: #fff;
        }

        .social-profile a {
            color: #fff;
        }

        .social-profile {
            position: relative;
            margin-bottom: 150px;
        }

        .social-profile .user-profile {
            position: absolute;
            bottom: -75px;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            left: 50px;
        }

        .social-nav {
            position: absolute;
            bottom: 0;
        }

        .social-prof {
            color: #333;
            text-align: center;
        }

        .social-prof .wrapper {
            width: 70%;
            margin: auto;
            margin-top: -100px;
        }

        .social-prof img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
            border: 5px solid #fff;
            /*border: 10px solid #70b5e6ee;*/
        }

        .social-prof h3 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 0;
        }

        .social-prof p {
            font-size: 18px;
        }

        .social-prof .nav-tabs {
            border: none;
        }

        .card .nav>li {
            position: relative;
            display: block;
        }

        .card .nav>li>a {
            position: relative;
            display: block;
            padding: 10px 15px;
            font-weight: 300;
            border-radius: 4px;
        }

        .card .nav>li>a:focus,
        .card .nav>li>a:hover {
            text-decoration: none;
            background-color: #eee;
        }

        .card .s-nav>li>a.active {
            text-decoration: none;
            background-color: #3afe;
            color: #fff;
        }

        .text-blue {
            color: #3afe;
        }

        ul.friend-list {
            margin: 0;
            padding: 0;
        }

        ul.friend-list li {
            list-style-type: none;
            display: flex;
            align-items: center;
        }

        ul.friend-list li:hover {
            background: rgba(0, 0, 0, .1);
            cursor: pointer;
        }

        ul.friend-list .left img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            margin-right: 20px;
        }

        ul.friend-list li {
            padding: 10px;
        }

        ul.friend-list .right h3 {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 0;
        }

        ul.friend-list .right p {
            font-size: 11px;
            color: #6c757d;
            margin: 0;
        }

        .social-timeline-card .dropdown-toggle::after {
            display: none;
        }

        .info-card h4 {
            font-size: 15px;
        }

        .info-card h2 {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .social-about .social-info {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .social-about p {
            margin-bottom: 20px;
        }

        .info-card i {
            color: #3afe;
        }

        .card-one {
            position: relative;
            width: 300px;
            background: #fff;
            /*box-shadow: 0 10px 7px -5px rgba(0, 0, 0, 0.4);*/
        }

        .card-one .header {
            position: relative;
            width: 100%;
            height: 60px;
            background-color: #3afe;
        }

        .card-one .header::before,
        .card-one .header::after {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: inherit;
        }

        .card-one .header::before {
            -webkit-transform: skewY(-8deg);
            transform: skewY(-8deg);
            -webkit-transform-origin: 100% 100%;
            transform-origin: 100% 100%;
        }

        .card-one .header::after {
            -webkit-transform: skewY(8deg);
            transform: skewY(8deg);
            -webkit-transform-origin: 0 100%;
            transform-origin: 0 100%;
        }

        .card-one .header .avatar {
            position: absolute;
            left: 50%;
            top: 30px;
            margin-left: -50px;
            z-index: 5;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            background: #ccc;
            border: 3px solid #fff;
        }

        .card-one .header .avatar img {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            width: 100px;
            height: auto;
        }

        .card-one h3 {
            position: relative;
            margin: 80px 0 30px;
            text-align: center;
        }

        .card-one h3::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            margin-left: -15px;
            width: 30px;
            height: 1px;
            background: #000;
        }

        .card-one .desc {
            padding: 0 1rem 2rem;
            text-align: center;
            line-height: 1.5;
            color: #777;
        }

        .card-one .contacts {
            width: 200px;
            max-width: 100%;
            margin: 0 auto 3rem;
        }

        .card-one .contacts a {
            display: block;
            width: 33.333333%;
            float: left;
            text-align: center;
            color: #c8c;
        }

        .card-one .contacts a:hover {
            color: #333;
        }

        .card-one .contacts a:hover .fa::before {
            color: #fff;
        }

        .card-one .contacts a:hover .fa::after {
            width: 100%;
            height: 100%;
        }

        .card-one .contacts a .fa {
            position: relative;
            width: 40px;
            height: 40px;
            line-height: 39px;
            overflow: hidden;
            text-align: center;
            font-size: 1.3em;
        }

        .card-one .contacts a .fa:before {
            position: relative;
            z-index: 1;
        }

        .card-one .contacts a .fa::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            background: #c8c;
            transition: width .3s, height .3s;
        }

        .card-one .contacts a:last-of-type .fa {
            line-height: 36px;
        }

        .card-one .footer {
            position: relative;
            padding: 1rem;
            background-color: #3afe;
            text-align: center;
        }

        .card-one .footer a {
            padding: 0 1rem;
            color: #e2e2e2;
            transition: color .4s;
        }

        .card-one .footer a:hover {
            color: #c8c;
        }

        .card-one .footer::before {
            content: '';
            position: absolute;
            top: -27px;
            left: 50%;
            margin-left: -15px;
            border: 15px solid transparent;
            border-bottom-color: #3afe;
        }

        .card-title, .card .card-title, .card-2 .card-title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        a {
            color: #333;
        }
        .badge {
            font-size: 12px;
            line-height: 1;
            padding: .375rem .5625rem;
            font-weight: normal;
        }

        .badge-primary {
            color: #447de8;
            background-color: #e6edff;
        }
        .badge {
            display: inline-block;
            padding: .4em .5em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }


        /*end social*/
    </style>
    @endsection
@section('content')
{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">--}}
    <main>
        <div class="container">
            <div class="row">

            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <ul class="friend-list">
                            <li>
                                <div class="left">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                                </div>
                                <div class="right">
                                    <h3>{{$user->name}}</h3>
                                    <p>{{$user->created_at->diffForHumans()}}</p>
                                </div>
                            </li>
                        </ul>
                        <ul class="list-group list-group-flush">

                            <li class="list-group-item">
                                @auth
                                <div class="h6 text-muted">Phone</div>
                                <div class="h5">{{$user->phone}}</div>
                                @else
                                    <div class="h6 text-muted">Phone</div>
                                    <a href="{{url('login')}}" class="btn btn-primary">Phone number</a>

                                @endauth
                            </li>

                            <li class="list-group-item">
                                <div class="h6 text-muted">Location</div>
                                <p><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-geo-alt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    </svg> {{$user->locally}}, {{$user->city}}</p>
                            </li>
                            <li class="list-group-item">
                                <div class="h6 text-muted">Category</div>
                                <div class="h5"> <p>{{$user->skill}}</p></div>
                            </li>
                            <li class="list-group-item">
                                <div class="h6 text-muted"></div>
                                <div class="h5">6758</div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 gedf-main">
                    <div class="card social-prof">
                        <div class="card-body mt-3">

                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card social-timeline-card">
                        <div class="card-body">
                            <h5 class="card-title">People you may know</h5>
                            <ul class="friend-list">
                                <li>
                                    <div class="left">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                                    </div>
                                    <div class="right">
                                        <h3>John Doe</h3>
                                        <p>10 Friends</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="left">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="">
                                    </div>
                                    <div class="right">
                                        <h3>John Doe</h3>
                                        <p>10 Friends</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="left">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
                                    </div>
                                    <div class="right">
                                        <h3>John Doe</h3>
                                        <p>10 Friends</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="left">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="">
                                    </div>
                                    <div class="right">
                                        <h3>John Doe</h3>
                                        <p>10 Friends</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="left">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="">
                                    </div>
                                    <div class="right">
                                        <h3>John Doe</h3>
                                        <p>10 Friends</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="left">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="">
                                    </div>
                                    <div class="right">
                                        <h3>John Doe</h3>
                                        <p>10 Friends</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="left">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
                                    </div>
                                    <div class="right">
                                        <h3>John Doe</h3>
                                        <p>10 Friends</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="left">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="">
                                    </div>
                                    <div class="right">
                                        <h3>John Doe</h3>
                                        <p>10 Friends</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="left">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="">
                                    </div>
                                    <div class="right">
                                        <h3>John Doe</h3>
                                        <p>10 Friends</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection



