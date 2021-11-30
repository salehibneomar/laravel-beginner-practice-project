<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdminProfileController extends Controller
{
    public function editPassword(){
        return view('admin.profile.password-update');
    }

    public function updatePassword(Request $request){
        $validated =  $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|max:32|confirmed'
        ]);

        if(!Hash::check($request->current_password, Auth::user()->password)){
            return redirect()->back()->with('error', 'Current password did not match');
        }

        $user = User::findOrFail(Auth::user()->id);
        $user->password = Hash::make($request->new_password);
        
        if(!$user->save()){
            return redirect()->back()->with('failed', 'Password update failed!');
        }

        return redirect()->route('login');

    }

    public function editProfile(){
        return view('admin.profile.profile-update');
    }

    public function updateProfile(Request $request){

        $validated =  $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'image' => 'nullable|mimes:png,jpg,jpeg|min:1|max:2048',
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->hasFile('image')){
            $imageFile      = $request->file('image');
            $uniqueNameGen  = hexdec(uniqid()).'_'.date('mdyHis');
            $imageExt       = Str::lower($imageFile->getClientOriginalExtension());
            $newImageName   = $uniqueNameGen.'.'.$imageExt;
            $imagePath      = 'profile-photos/'.$newImageName;
    
            Image::make($imageFile)->resize(100, 100)->save('storage/'.$imagePath);

            if(file_exists('storage/'.$user->profile_photo_path)){
                unlink('storage/'.$user->profile_photo_path);
            }
            
            $user->profile_photo_path = $imagePath;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
