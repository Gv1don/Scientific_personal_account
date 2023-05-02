<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Article;
use App\Models\Profile;

class ArticleController extends Controller
{
    public function createArticle(Request $request){

        $title = $request->title;
        $article = Article::where('title', $title)->first();

        if(!$article){

            $user = Auth::user();

            if($request->file('file')){
                $file = $request->file('file');
                $fileName = $file->getClientOriginalName();
                $filePath = 'storage/' . $user->id . '/';

                if(!file_exists($filePath)){
                    mkdir(public_path($filePath), 0777, true);
                }

                $file->move(public_path($filePath), $fileName);

                $article = new Article();
                $article->path = $filePath . $fileName;
                $article->profile_id = Profile::where('user_id', $user->id)->first()->id;
                $article->mentor = $request->mentor;
                $article->uniqueness = rand(70, 95);
                $article->title = $request->title;
                $article->save();

                return redirect()->route('profile');
            }
        }

        return redirect()->route('article');
    }
}
