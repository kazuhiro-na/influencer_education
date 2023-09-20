<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Classroom;
use App\Models\User;
use App\Models\Article;

class UserController extends Controller
{
    protected $table = 'classes';

    public function progress($userId)
    {
        if (Auth::check()){
            $user = User::find($userId); 
            if (!$user) {
                return redirect('/home')->with('error', 'ユーザーが見つかりません。');
            }            
            
            $userName = $user->name;
            $classroomName = $user->classroom->name;
            $classes = Classroom::all();
            $userId = $user->id;
            $curriculum = $user->classroom->curriculums;
            
            return view('user.progress', compact('userName', 'classroomName', 'classes', 'userId', 'curriculum'));
        }
    }

    public function article($articleId)
    {
        $article = Article::find($articleId);

        if (!$article) {
            return redirect()->route('home')->with('error', 'お知らせが見つかりません。');
        }

        return view('user.articles', compact('article'));
    }
}
