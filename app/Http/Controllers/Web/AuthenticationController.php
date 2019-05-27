<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthenticationController extends Controller
{
    //
    public function getSocialRedirect($provider)
    {
        // try {

        //     return Socialite::with($account)->redirect();

        // } catch (\InvalidArgumentException $e) {

        //     return redirect('/login');
        // }
        return Socialite::driver($provider)->redirect();

    }
    public function getSocialCallback($provider)
    {
        // $socialUser = Socialite::with($account)->user();
         $userSocial = Socialite::driver($provider)->user();
//        $userSocial = Socialite::driver($provider)->stateless()->user();
//         dd($userSocial);
//         dd($provider);

        //if user has login record of users table
        $users = User::where(['email' => $userSocial->getEmail()])->first();
//         dd($users);

        if ($users) {
            Auth::login($users);
            return redirect('/#/home');
        } else {
//            $test = array(
//                'name' => $userSocial->getName(),
//                'email'=>$userSocial->getEmail(),
//                'avatar' => $userSocial->getAvatar(),
//                'password' => '',
//                'provider' => $provider,
//                'provider_id' => $userSocial->getId(),
//            );

            $user = new User;
            $user->name = $userSocial->getName();
            $user->email = $userSocial->getEmail();
            $user->avatar = $userSocial->getAvatar();
            $user->password = '';
            $user->provider = $provider;
            $user->provider_id = $userSocial->getId();
//            dd($user);
            $user->save();

//            dd($test);
//            $user = User::create($test);

//            $user = User::create([
//                'name' => $userSocial->getName(),
//                'email' => $userSocial->getEmail(),
//                'avatar' => $userSocial->getavatar(),
//                'password' => '',
//                'provider' => $provider,
//                'provider_id' => $userSocial->getId(),
//            ]);
            //modify
            return redirect('/#/home');
//            return redirect('/');
        }
    }
}
