<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Library\Helper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Http\Requests\Auth\Login as AuthLoginRequest;

class AuthController extends Controller
{
    public function index()
    {
        if(auth()->check()) {
            return redirect()->route('admin.dashboard.index');
        }
        return Inertia::render("Auth/Login");
    }

    public function login(AuthLoginRequest $request)
    {
        $cred = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($cred)) {
            $user = User::where('email', $request->email)->first();
            Auth::login($user);
            return redirect()->route('admin.dashboard.index');
        }

        Helper::errorMessage("Invalid Cred");

        return redirect()->back();
    }
}
