<?php

namespace App\Http\Controllers\admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminProfileController extends Controller
{
    // UPDATE NAME,EMAIL,PROFILE PICTURE
    function adminProfilePage(){
        $admin_data = Auth::guard('admin')->user();
        return view('admin.adminProfileView',compact('admin_data'));
    }

    function updateProfile(Request $request, $id){
        $admin_data = Auth::guard('admin')->user();
        $user_id = $id;
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'picture' => 'mimes:jpeg,jpg,png,gif|max:6000'
        ]);



        $fileName = $admin_data->profile_photo_path;

        if($request->file('picture')){
            $file = $request->file('picture');
            @unlink(public_path('uploads/admin_images/'.$admin_data->profile_photo_path));
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/admin_images'),$fileName);
        }

        $save = DB::table('admins')
        ->where('id', $user_id)
        ->limit(1)
        ->update(array(
            'name' => $request->name,
            'email' => $request->email,
            'profile_photo_path' => $fileName
        ));


        //alert Notifications
        $notification_success = array(
            'message' => 'Update Successful',
            'alert-type' => 'success'
        );
        $notification_fail = array(
            'message' => 'Nothing Changed',
            'alert-type' => 'error'
        );

        if($save){
            return redirect()->route('admin.profile')->with($notification_success);
        }
        if(!$save){
            return redirect()->route('admin.profile')->with($notification_fail);
        }


        return redirect()->route('admin.profile');
    }

    //UPDATE PASSWORD ADMIN
    function updatePassword(Request $request,$id){
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'min:8|required_with:confirmPassword|same:confirmPassword',
            'confirmPassword' => 'min:8'
        ]);

        $admin_data = Auth::guard('admin')->user();
        $current_password = $admin_data->password;
        $save = false;

        if(Hash::check($request->oldPassword,$current_password)){
            $save = DB::table('admins')
            ->where('id', $id)
            ->limit(1)
            ->update(array(
                'password' => Hash::make($request->newPassword),
            ));
        }

        $notification_success = array(
            'message' => 'Update Successful',
            'alert-type' => 'success'
        );
        $notification_fail = array(
            'message' => 'Nothing Changed',
            'alert-type' => 'error'
        );

        if($save){
            return redirect()->route('admin.profile')->with($notification_success);
        }

        if(!Hash::check($request->oldPassword,$current_password)){
            $notification_fail = array(
                'message' => 'Invalid Password',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.profile')->with($notification_fail);

        }
        if(!$save){
            return redirect()->route('admin.profile')->with($notification_fail);
        }

        return redirect()->route('admin.profile');


    }
}
