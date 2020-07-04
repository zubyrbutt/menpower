@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <strong style="font-size: 20px">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M11 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM1.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM6 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm4.5 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                <path fill-rule="evenodd" d="M13 7.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0v-2z"/>
                            </svg>
                        </strong> <span><b> Feature</b></span>
                    </div>
                    <div class="card-body">

                        <a href="{{url('/dashboard')}}" class="card-link link-text">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z"/>
                                <path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                            </svg>
                            Notifications <span
                                class="badge badge-light">  10</span></a>
                        <hr>
 <a href="{{url('/dashboard')}}" class="card-link link-text">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                                <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            </svg>
     <span>Add Skills</span></a>
                        <hr>

                            <a href="{{url('/dashboard')}}" class="card-link link-text">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                                    <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                                </svg>
                                <span> Change Name</span></a>
                            <hr>
                        <a href="{{url('/dashboard')}}" class="card-link link-text">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                                    <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                                </svg>
                                <span> Change Password</span> </a>
                            <hr>
                            <a href="{{url('/dashboard/add-new-location')}}" class="card-link link-text">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                                    <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                                </svg>
                                <span> Update Location</span>

                            </a>
                            <hr>

                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('profileUpdate') }}">
                            @csrf

                            <div class="align-items-center mb-2">
                                <img class="img-thumbnail" width="150" height="150"
                                     src="{{asset('/images/profile/profile.png')}}" alt="image">

                            </div>
                            <div class="form-group">
                                <span></span>


                                Phone
                                <input id="phone" type="text"
                                       class="form-control @error('phone') is-invalid @enderror" name="phone"
                                       value="{{Auth::user()->phone}}" readonly autocomplete="name">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <div class="form-group">

                                Email
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{Auth::user()->email != null ? Auth::user()->email : ''}}"
                                       autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            @if(Auth::user()->state != null && Auth::user()->city != null && Auth::user()->locally !=null)
                                <strong>State: </strong> <span class="text link-text text-muted">{{Auth::user()->state}}</span><br>
                                <strong>City: </strong> <span class="text link-text text-muted">{{Auth::user()->city}}</span><br>
                                <strong>Local Area: </strong> <span class="text link-text text-muted">{{Auth::user()->locally}}</span><br>

                            @else
                                <div class="form-group"> State
                                    <select name="state" id="state" class="form-control input-lg dynamic"
                                            data-dependent="city">
                                        <option value="">Select State</option>
                                        @foreach($state_list as $item)
                                            <option value="{{ $item->state}}">{{ $item->state }}</option>
                                        @endforeach
                                    </select>

                                    @error('state')
                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    City
                                    <select name="city" id="city" class="form-control input-lg dynamic"
                                            data-dependent="locally">
                                        <option value="">Select city</option>
                                    </select>

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                    @enderror
                                </div>

                                <div class="form-group">

                                    Local Area

                                    <select name="locally" id="locally" class="form-control input-lg">
                                        <option value="">Select locally</option>
                                    </select>

                                    {{ csrf_field() }}

                                    @error('locality')
                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                    @enderror
                                </div>
                            @endif





                            {{--                            <div class="form-group">--}}

                            {{--                                <div class="col-md-6">--}}
                            {{--                                    Pssword--}}
                            {{--                                    <input id="password" type="password"--}}
                            {{--                                           class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">--}}

                            {{--                                    @error('password')--}}
                            {{--                                    <span class="invalid-feedback" role="alert">--}}
                            {{--                                        <strong>{{ $message }}</strong>--}}
                            {{--                                    </span>--}}
                            {{--                                    @enderror--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}

                            {{--                            <div class="form-group">--}}
                            {{--                                <div class="col-md-6">--}}
                            {{--                                    Confirm Password--}}
                            {{--                                    <input id="password-confirm" type="password" class="form-control"--}}
                            {{--                                           name="password_confirmation"      autocomplete="new-password">--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}


                            <div class="form-group ">

                                <button class="btn btn-primary" type="submit">{{ __('Save') }}</button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col"></div>

        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {

            $('.dynamic').change(function () {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('dynamicdependent.fetch') }}",
                        method: "POST",
                        data: {select: select, value: value, _token: _token, dependent: dependent},
                        success: function (result) {
                            $('#' + dependent).html(result);
                        }

                    })
                }
            });

            $('#country').change(function () {
                $('#state').val('');
                $('#city').val('');
            });

            $('#state').change(function () {
                $('#city').val('');
            });


        });
    </script>

@endsection

