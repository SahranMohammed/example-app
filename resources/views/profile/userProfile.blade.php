@extends('frontend.master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2"><br><br>
                    <img class="card-img-top" width="100%" height="100%" src="{{asset('uploads/admin_images/no_image.jpg')}}" style="border-radius: 50%" alt=""><br><br>
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

                    <div class="card-body">
                        <form action="{{route('user.profile.update',[$user->id])}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" >Name <span></span></label>
                                <input type="text" class="form-control unicase-form-control text-input"
                                    name="name" value="{{ $user->name }}"  />
                            </div>
                            <div class="form-group">
                                <label class="info-title" >Email <span></span></label>
                                <input type="email" class="form-control unicase-form-control text-input"
                                    name="email" value="{{ $user->email }}"  />
                            </div>
                            <div class="form-group">
                                <label class="info-title" >Profile Picture <span></span></label>
                                <input type="file" class="form-control unicase-form-control text-input"
                                    name="profile_photo_path"  />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
