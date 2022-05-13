<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showProfile(User $user){
        return view('users.profile', compact('user'));
    }

    public function editProfile(User $user){
        return view('users.edit', compact('user'));
    }

    public function updateProfile(Request $request, User $user){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::id())],
            'image' => ['image']
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images', $image);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_image = $image;
        $user->save();

        return redirect()->route('users.profile', $user)->with('flash', 'プロフィールを更新しました');
    }
}
