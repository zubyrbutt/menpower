@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.partials')

            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('profileUpdate') }}">
                            @csrf

                            <div class="align-items-center mb-2">
                                <img class="img-thumbnail" width="150" height="150"
                                     src="{{asset('/images/profile/profile.png')}}" alt="image">

                            </div>

                           <p><strong>Phone:</strong> {{$user->phone}}</p>


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

