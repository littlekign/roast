<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class AuthenticationController extends Controller
{
    //
    public function getSocialRedirect($account)
    {
        // try {

        //     return Socialite::with($account)->redirect();

        // } catch (\InvalidArgumentException $e) {

        //     return redirect('/login');
        // }
        return Socialite::driver('github')->redirect();

    }
    public function getSocialCallback($account)
    {
        // $socialUser = Socialite::whti($account)->user();
        $user = Socialite::driver('github')->user();
        return $user;

    }
}
