<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function retrieveName(Request $request) {
        return response()->json([
            'name' => session('fname') . ' ' .  session('lname')
        ]);
    }
}
