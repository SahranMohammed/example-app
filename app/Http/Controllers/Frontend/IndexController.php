<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    function loadIndexPage(){
        return view('frontend.index');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('load.index.page');
    }

    public function userProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('profile.userProfile',compact('user'));
    }

    public function userProfileUpdate(Request $request, $id){
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'profile_photo_path' => 'mimes:jpeg,jpg,png,gif|max:6000'
        ]);

        $user = Auth::guard('web')->user();

        $fileName = $user->profile_photo_path;

        if($request->file('profile_photo_path') && $fileName == !null){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('uploads/user_images/'.$fileName));
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/user_images'),$fileName);
        }else{
            if($request->file('profile_photo_path')){
            $fileName=$request->profile_photo_path;
            $file = $request->file('profile_photo_path');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/user_images'),$fileName);
            }
        }


        $save = DB::table('users')
        ->where('id',$id)
        ->limit(1)
        ->update(array(
            'name' => $request->name,
            'email' =>$request->email,
            'profile_photo_path'=>$fileName
        ));

        $notification_success = array(
            'message' => 'Update Successful',
            'alert-type' => 'success'
        );
        $notification_fail = array(
            'message' => 'Nothing Changed',
            'alert-type' => 'error'
        );

        if($save){
            return redirect()->route('user.profile')->with($notification_success);
        }
        if(!$save){
            return redirect()->route('user.profile')->with($notification_fail);
        }


        return redirect()->route('user.profile');


    }
}
