<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        // ここで必要なデータを取得する、例えば:
         //$classes = Class::all();

        return view('classroom.index'); // , compact('classes')
    }
}
