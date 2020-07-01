@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <p class="card-text">
                            {{$user->name}}
                        </p>

                    </div>
                    <div class="card-body">
                            <div class="align-items-center mb-2">
                                <img class="img-thumbnail" src="{{asset('/images/men.jpg')}}" alt="image">

                            </div>
                            <div class="form-group row">
                                <span></span>

                                <div class="col-md-6">
                                    Phone
                                    <input id="phone" type="text"
                                           class="form-control @error('phone') is-invalid @enderror" name="phone"
                                           value="{{$user->phone}}" readonly autocomplete="name">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-6">
                                    Email
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{$user->email != null ? $user->email : ''}}" required
                                           autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                        <p>
                            Skills
                            Plunmber, Electrition
                        </p>
                        <p>
                            Rawalpindi, Pakistan
                        </p>
                    </div>
                </div>

            </div>
            <div class="col">
                <div class="card">
                    <textarea type="text"></textarea>
                </div>
            </div>
        </div>
    </div>
@endsection


