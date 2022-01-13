<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class SignupController extends Controller
{
    public function create(Request $request) {
        
        if(User::where('username', $request->user['username'])->exists()) {
            return response()->json(['success' => false]);
        }
        else {
            $user = new User;

            $user->username = $request->user['username'];
            $user->fname = $request->user['fname'];
            $user->lname = $request->user['lname'];
            $user->password = Hash::make($request->user['password']);

            $user->save();

            return response()->json(['success' => true]);
        }    
    }
}
