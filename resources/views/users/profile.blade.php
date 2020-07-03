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

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <strong style="font-size: 20px"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"/>
                                <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"/>
                            </svg>  </strong> <span><b>Setting</b></span>
                    </div>
                    <div class="card-body">
                        <div class="search-card" id="ajax">
                          <a href="{{url('/dashboard')}}" class="card-link link-text">  Change Password</a><span class="badge badge-light">  10</span><hr>
                            <a href="{{url('/dashboard/add-new-location')}}" class="card-link link-text">Add New Location</a><span class="badge badge-light">  10</span><hr>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('profileUpdate') }}">
                            @csrf

                            <div class="align-items-center mb-2">
                                <img class="img-thumbnail" width="150" height="150" src="{{asset('/images/profile/profile.png')}}" alt="image">

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


                            <div class="form-group"> State
                                <select name="state" id="state" class="form-control input-lg dynamic" data-dependent="city">
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
                                <select name="city" id="city" class="form-control input-lg dynamic" data-dependent="locally">
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
        $(document).ready(function(){

            $('.dynamic').change(function(){
                if($(this).val() != '')
                {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{ route('dynamicdependent.fetch') }}",
                        method:"POST",
                        data:{select:select, value:value, _token:_token, dependent:dependent},
                        success:function(result)
                        {
                            $('#'+dependent).html(result);
                        }

                    })
                }
            });

            $('#country').change(function(){
                $('#state').val('');
                $('#city').val('');
            });

            $('#state').change(function(){
                $('#city').val('');
            });


        });
    </script>

@endsection

