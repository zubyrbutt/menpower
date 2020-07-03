@extends('layouts.app')
@section('style')


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
                            <div class="search-card" id="ajax">
                                <a href="{{url('/dashboard')}}" class="card-link link-text">Home</a><span class="badge badge-light">  10</span><hr>
                                <a href="{{url('/dashboard/add-new-location')}}" class="card-link link-text">Add New Location</a><span class="badge badge-light">  10</span><hr>
                            </div>
                    </div>
                </div>
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
            </div>


        </div>
    </div>


@endsection

