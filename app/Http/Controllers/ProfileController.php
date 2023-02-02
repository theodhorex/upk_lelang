<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Redirect;

class ProfileController extends Controller
{
    public function profilePages() {
        $currentLoggedUser = Auth::user()->id;
        $user_data = User::find($currentLoggedUser);
        return view('pages/profile', compact('user_data'));
    }
    
    public function updateProfile(Request $request) {
        $currentLoggedUser = Auth::user()->id;
        $update_profile = User::find($currentLoggedUser);

        $update_profile -> name = $request -> name;
        $update_profile -> email = $request -> email;
        $update_profile -> phone_number = $request -> phone_number;
        $update_profile -> about_me = $request -> about_me;

        if($request -> hasFile('profile_photo')){
            $image = 'data:image/png;base64,' . base64_encode(file_get_contents($request -> file('profile_photo')));
            $update_profile -> profile_photo = $image;
        }

        $update_profile -> update();
        return redirect('/home');

    }
}
