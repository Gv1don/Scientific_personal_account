<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Profile;
use App\Models\Article;

class ProfileController extends Controller
{
    public function profileRendering(){
        
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
        $articles = DB::table('articles')->where('profile_id', $profile->id)->get();
        if($profile){
            $fullName = $profile->last_name . " " . $profile->first_name . " " . $profile->middle_name;
            $qualification = $profile->qualification;
            $specialisation = $profile->specialisation;
            $timeOnSite = Carbon::parse($profile->created_at)->diffInDays(Carbon::now())+1;
            $worksNumber = $articles->count();
            $avgUniq = $articles->avg('uniqueness');
            return view('profile', compact('fullName', 'qualification', 'specialisation', 'timeOnSite', 'worksNumber', 'avgUniq', 'articles'));
        }
        else{
            return redirect()->route('registration');
        }   
    }

    public function profileEditing(){
        
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();

        $first_name = $profile->first_name;
        $middle_name = $profile->middle_name;
        $last_name = $profile->last_name;
        $qualification = $profile->qualification;
        $specialisation = $profile->specialisation;

        return view('edit_profile', compact('first_name', 'qualification', 'specialisation', 'middle_name', 'last_name'));
    }

    public function profileUpdating(Request $request){

        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
        $profile->first_name = $request->input('first_name');
        $profile->middle_name = $request->input('middle_name');
        $profile->last_name = $request->input('last_name');
        $profile->specialisation = $request->input('specialisation');
        $profile->qualification = $request->input('qualification');
        $profile->save();

        return redirect()->route('profile');
    }
}
