@extends('frontend.master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2"><br><br>
                    <img class="card-img-top" width="100%" height="100%" src="{{asset('uploads/user_images/'.Auth::user()->profile_photo_path)}}" style="border-radius: 50%; object-fit:cover; width:150px; height:150px" alt=""><br><br>
                    <ul class="list-group list-group-flush">
                        <a href="" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile</a>
                        <a href="" class="btn btn-primary btn-sm btn-block">Change Password</a> <br>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                                <a class="btn btn-danger btn-sm btn-block" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            this.closest('form').submit(); " >
                                            Logout
                                </a>
                        </form>
                    </ul>
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-6">
                    <h3 class="text-center">Hi {{Auth::user()->name}}</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
