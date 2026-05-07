<?php

namespace App\Http\Controllers;

use App\Mail\User\AfterRegister;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function login(){
        return view('auth.user.login');
    }

    public function google() {
        return Socialite::driver('google')->redirect();
    }

    
    public function googleCallback() {
        /** @var \Laravel\Socialite\Two\AbstractProvider $socialite */
        $socialite = Socialite::driver('google');
        $callback = $socialite->stateless()->user();
        $data = [
            'name' => $callback->getName(),
            'email' => $callback->getEmail(),
            'avatar' => $callback->getAvatar(),
            'email_verified_at' => now(),
        ];

        $user = User::whereEmail($data['email'])->first();
        if(!$user) {
            $user = User::create($data);
            Mail::to($user->email)->send(new AfterRegister($user));
        }
        Auth::login($user, true);

        return redirect()->route('welcome');
    }
}
