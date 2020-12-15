<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Login;
use App\Services\UserService;

class LoginController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(Login $request)
    {
        if (\Auth::attempt($request->validated())) {
            $request->session()->regenerate();

            return response()->json([
                'message' => __('messages.auth.loginsuccess')
            ], 200);
        }

        return response()->json([
            'message' => __('messages.auth.loginfailed')
        ], 401);
    }

    public function logout()
    {
        \Auth::logout();

        return response()->json([
            'message'   => __('messages.auth.logoutsuccess')
        ], 200);
    }

    public function verifyEmail(Request $request)
    {
        if (! $request->hasValidSignature()) {
            abort(401);
        }

        $verified = $this->userService->verifyUserEmail($request->user);

        if ($verified) {
            return view('auth.email-verification-success');
        }

        abort(401);
    }

    public function checkSession()
    {
        if (\Auth::check()) {
            return response()->json([
                'has_session'   => true,
                'user'  => \Auth::user(),
                'menu'  => \Auth::user()->qrmenu,
                'pages' => \Auth::user()->qrmenu->pages
            ], 200);
        }

        return response()->json([
            'has_session'   => false
        ], 401);
    }

}
