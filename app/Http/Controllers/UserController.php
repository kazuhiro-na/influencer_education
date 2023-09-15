<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Classroom;
use App\Models\User;

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
            //$curriculum = $classes->curriculums;
            return view('user.progress', compact('userName', 'classroomName', 'classes'));
            }
    }
}
