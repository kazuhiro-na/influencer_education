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
            
            return view('user.progress', compact('userName', 'classroomName', 'classes', 'userId', 'curriculum', 'user'));
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

    public function edit()
    {
        $user = auth()->user();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $rules = [
            'name' => 'required|string|max:255',
            'name_kana' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' .$user->id,
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $request->validate($rules);

        $input = $request->only(['name', 'name_kana', 'email']);

        // 画像をアップロードした場合の処理
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profiles', 'public');
            $input['profile_image'] = $imagePath;
        }

        $user->update($input);
        return redirect()->route('user.edit')->with('success', 'プロフィールが更新されました。');
    }
}
