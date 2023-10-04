<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function change()
    {
        return view('auth.passwords.change');
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        //現在のパスワードが正しいか確認
        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return redirect()->back()->with('error', '現在のパスワードが正しくありません。');
        }

        //新しいパスワードを設定
        $user = auth()->user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('password.change')->with('success', 'パスワードを変更しました。');
    }
}
