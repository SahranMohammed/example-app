@extends('admin.dashboard')
@section('admin')

    <div class="content-wrapper">
        <div class="container-full">

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black"
                            style="background: url('../images/gallery/full/10.jpg') center center;">
                            <h3 class="widget-user-username">{{ $admin_data->name }}</h3>
                            <h6 class="widget-user-desc">{{ $admin_data->email }}</h6>
                        </div>
                        <div class="widget-user-image">
                            <img class="rounded-circle"
                                src="{{ !empty($admin_data->profile_photo_path) ? url('uploads/admin_images/'.$admin_data->profile_photo_path) : url('uploads/admin_images/no_image.jpg') }}"
                                alt="User Avatar" style="width: 100px; height:100px;object-fit: cover">
                        </div>

                    </div>
                </div>
            </section>
            <!-- /.content -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Edit Profile</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{ route('admin.updateProfile',[$admin_data->id]) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>User Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control" required="" value="{{ $admin_data->name }}"
                                                                data-validation-required-message="This field is required">
                                                            <div class="help-block"></div>
                                                            @error('name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Email Field <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="email" name="email" class="form-control" required="" value="{{ $admin_data->email }}"
                                                                data-validation-required-message="This field is required">
                                                            <div class="help-block"></div>
                                                            @error('email')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>File Input Field</h5>
                                                        <div class="controls">
                                                            <input type="file" name="picture" id="Image" name="file" class="form-control"
                                                                >
                                                            <div class="help-block"></div>
                                                            @error('picture')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <img
                                                    src="{{ !empty($admin_data->profile_photo_path) ? url('uploads/admin_images/'.$admin_data->profile_photo_path) : url('uploads/admin_images/no_image.jpg') }}"
                                                    alt="User Avatar" style="width: 100px; height:100px;object-fit: cover" id="ShowImage">
                                                </div>
                                            </div>






                                            <div class="text-xs-right">
                                                <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                                            </div>
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>

            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Change Password</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{ route('admin.updatePassword',[$admin_data->id]) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Old Password <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="password" name="oldPassword" class="form-control" required="" value=""
                                                                data-validation-required-message="This field is required">
                                                            <div class="help-block"></div>
                                                            @error('oldPassword')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>New Password <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="password" name="newPassword" class="form-control" required="" value=""
                                                                data-validation-required-message="This field is required">
                                                            <div class="help-block"></div>
                                                            @error('newPassword')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Confirm Password <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="Password" name="confirmPassword" id="Image" name="file" class="form-control"
                                                                >
                                                            <div class="help-block"></div>
                                                            @error('confirmPassword')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>








                                            <div class="text-xs-right">
                                                <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                                            </div>
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#Image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#ShowImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection




