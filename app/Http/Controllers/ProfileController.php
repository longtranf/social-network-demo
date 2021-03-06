<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

// request
use App\Http\Requests\UpdateProfileRequest;

// model
use App\User;
use App\Profile;

class ProfileController extends Controller
{

    public function __construct() 
    {

    }

    // show user profile
    // public function showMyProfile() 
    // {
    //     $user = Auth::user();
    //     $profile = Profile::find(Auth::id());

    //     $data = array (
    //         'user'    => $user,
    //         'profile' => $profile
    //     );

    //     return view('pages.profile')->with($data);
    // }
    
    // show other profile
    // input: $id
    public function showProfile($id = null) 
    {
        
        $user = Auth::user();
        
        if ($id != null) 
        {
            $profile = Profile::find($id);
        }
        else 
        {
            $profile = Profile::find($user->profile_id);
        }

        $data = array (
            'user'    => $user,
            'profile' => $profile
        );

        return view('pages.profile')->with($data);
    }

    public function editProfile() 
    {
        $user    = Auth::user();
        $profile = Profile::find($user->profile_id);

        $data = array (
            'profile' => $profile
        );

        return view('pages.edit-profile')->with($data);
    }

    public function updateProfile (UpdateProfileRequest $request)
    {
        $user    = Auth::user();
        $profile = Profile::find($user->profile_id);
        
        $profile->name     = $request->name;
        $profile->email    = $request->email;
        $profile->city     = $request->city;
        $profile->country  = $request->country;
        $profile->birthday = $request->birthday;
        $profile->save();

        return redirect()->route('profile');
    }
}
