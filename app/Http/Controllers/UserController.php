<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $table = 'classes';

    public function progress()
    {
        if (Auth::check()){
            $user = Auth::user();
            $userName = $user->name;
            $classroomName = $user->classroom->name;
            $classes = [
                '小学1年生' => 'カリキュラム1',
                '小学2年生' => 'カリキュラム2',
            ];
            return view('user.progress', compact('userName', 'classroomName', 'classes'));
        }else {
            return redirect('/login');
        }
    }
}
