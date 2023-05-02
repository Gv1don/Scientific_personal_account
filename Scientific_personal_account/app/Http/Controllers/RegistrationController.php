<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function registration(Request $request){   

        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if($user){
            return redirect()->route('registration');
        };

        $password = $request->input('password');
        $confirm = $request->input('confirm-password');

        if($password == $confirm){
            $user = new User();
            $user->email = $email;
            $user->password = Hash::make($password);
            $user->save();
            
            $profile = new Profile();
            $profile->first_name = $request->input('first_name');
            $profile->middle_name = $request->input('middle_name');
            $profile->last_name = $request->input('last_name');
            $profile->specialisation = $request->input('specialisation');
            $profile->qualification = $request->input('qualification');
            $profile->user_id = $user->id;
            $profile->save();

            return redirect()->route('login');
        }
        else{
            return redirect()->route('registration');
        }
    }
}
