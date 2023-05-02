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
        
        if(Auth::check()){
            $user = Auth::user();
            $profile = Profile::where('user_id', $user->id)->first();
            $articles = DB::table('articles')->where('profile_id', $profile->id)->get();
            if($profile){
                $fullName = $profile->last_name . " " . $profile->first_name . " " . $profile->middle_name;
                $qualification = $profile->qualification;
                $specialisation = $profile->specialisation;
                $timeOnSite = Carbon::now()->diffInDays(Carbon::parse($profile->created_at));
                $worksNumber = $articles->count();
                $avgUniq = $articles->avg('uniqueness');
                return view('profile', compact('fullName', 'qualification', 'specialisation', 'timeOnSite', 'worksNumber', 'avgUniq', 'articles'));
            }
            else{
                return redirect()->route('registration');
            }
            
        }
        else{
            return redirect()->route('login');
        }
    }
}
