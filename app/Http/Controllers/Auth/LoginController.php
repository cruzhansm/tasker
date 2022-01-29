<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function check(Request $request) {
        $user = new User;
        
        $user->username = $request->user['username'];
        $user->password = $request->user['password'];

        if(User::where('username', $user->username)->exists()) {
            $hashed = User::where('username', $user->username)->value('password');
            if(Hash::check($user->password, $hashed)) {
                $uauth = User::where('username', $user->username)->first();

                session(['fname' => $uauth->fname, 'lname' => $uauth->lname]);
                
                return response()->json([
                    'success' => true
                ]);
            }
            else {
                return response()->json([
                    'success' => false,
                    'error' => 'Incorrect password associated with account.'
                ]);
            }
        }
        else {
            return response()->json([
                'success' => false,
                'error' => 'No account with such username exists.'
            ]);
        }
    }
}