@extends('frontend.master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('profile.profile-aside')
                <div class="col-md-2">
                </div>
                <div class="col-md-6">
                    <h3 class="text-center">Hi {{Auth::user()->name}}</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
