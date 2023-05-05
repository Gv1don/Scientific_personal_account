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

                $this->warehouse($filePath, $fileName, $file);

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

    public function editArticle(Request $request){

        $article = $request->input('article_id');
        $article = Article::find($article)->first(); 

        return view('edit_article', compact('article'));
    }

    public function deleteArticle(Request $request){

        $article = $request->input('article_id');
        $article = Article::find($article);
        $file = $article->path;

        if (file_exists($file)){
            unlink($file);
        }

        $article->delete();

        return redirect()->route('profile');
    }

    public function updateArticle(Request $request){
        
        $id = $request->input('article_id');
        $title = $request->input('title');
        $mentor = $request->input('mentor');

        $article = Article::where('id', $id)->first();
        $article->title = $title;
        $article->mentor = $mentor;
        $file = $request->file('file');

        if($file){
            $this->warehouse($directory = substr($article->path, 0, strrpos($article->path, "/")), $file->getClientOriginalName(), $file);
        }

        $article->save();

        return redirect()->route('profile');
    }

    public function warehouse($filePath, $fileName, $file){

        if(file_exists(public_path($filePath . $fileName))){
            return redirect()->route('profile');
        }
        else 
        {
            if(!file_exists(public_path($filePath))){
                mkdir(public_path($filePath), 0777, true);
            }

            $file->move(public_path($filePath), $fileName);
        }
    }
}
