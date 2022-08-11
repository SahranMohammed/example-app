@extends('frontend.master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('profile.profile-aside')
                <div class="col-md-2">
                </div>
                <div class="col-md-6">
                    <h3 class="text-center">Edit Profile</h3>

                    <div class="card-body">
                        <form action="{{route('user.profile.update',[$user->id])}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" >Name <span></span></label>
                                <input type="text" class="form-control unicase-form-control text-input"
                                    name="name" value="{{ $user->name }}"  />
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" >Email <span></span></label>
                                <input type="email" class="form-control unicase-form-control text-input"
                                    name="email" value="{{ $user->email }}"  />
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" >Profile Picture <span></span></label>
                                <input type="file" class="form-control unicase-form-control text-input"
                                    name="profile_photo_path"  />
                                    @error('profile_photo_path')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
