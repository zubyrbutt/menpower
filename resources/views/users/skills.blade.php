@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.partials')

            <div class="col-md-5">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('userskillsstore') }}">
                            @csrf
                                <div class="form-group"> Skill
                                    <select name="name" id="name" class="form-control">
                                        <option value="">Select Skill</option>
                                        @foreach($skills as $skill)
                                            <option value="{{ $skill->name}}">{{ $skill->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('state')
                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                    @enderror
                                </div>

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


