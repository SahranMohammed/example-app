@extends('frontend.master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('profile.profile-aside')
                <div class="col-md-2">
                </div>
                <div class="col-md-6">
                    <h3 class="text-center">Change Password</h3>

                    <div class="card-body">
                        <form action="{{route('user.changePassword.update')}}"  method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" >Old Password <span></span></label>
                                <input type="password" class="form-control unicase-form-control text-input"
                                    name="oldPassword" value="{{old('oldPassword')}}"  />
                                    @error('oldPassword')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" >New Password <span></span></label>
                                <input type="password" class="form-control unicase-form-control text-input"
                                    name="newPassword" value="{{old('newPassword')}}"  />
                                    @error('newPassword')
                                     <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" >Confirm Password <span></span></label>
                                <input type="password" class="form-control unicase-form-control text-input"
                                    name="confirmPassword" value="{{old('confirmPassword')}}" />
                                    @error('confirmPassword')
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
