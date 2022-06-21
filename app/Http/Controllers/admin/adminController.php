<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    function adminPage(){
        return view('admin.adminLogin');
    }

    function login(Request $request){
        $request->validate([
            'email' => 'email|required',
            'password' => 'required|max:50',
        ]);

        $creds = $request->only('email','password');
        if(Auth::guard('admin')->attempt($creds)){
            return redirect()->route('admin.dashboard');
        }else{
            return back()->with('fail','Incorrect Password');
        }


    }

    function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
