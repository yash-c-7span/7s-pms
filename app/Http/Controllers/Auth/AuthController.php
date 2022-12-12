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
        return Inertia::render("Auth/Login");
    }

    public function login(AuthLoginRequest $request)
    {
        $cred = [
            'mobile' => $request->mobile,
            'password' => $request->password,
        ];

        
        if(Auth::attempt($cred)) {
            $user = User::where('mobile', $request->mobile)->first();
            Auth::login($user);
            return redirect()->route('user.home');
        }

        Helper::errorMessage("Invalid Cred");

        return redirect()->back();
    }
}
