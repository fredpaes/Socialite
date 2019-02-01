<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    // const $rs = [
    //     'github' => 'GitHub',
    //     'facebook' => 'Facebook',
    //     'google' => 'Google+',
    // ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    // public function redirectToProvider()
    // {
    //   return Socialite::driver('github')->redirect();
    // }
    //
    // public function handleProviderCallback()
    // {
    //     $githubUser = Socialite::driver('github')->user();
    //
    //     $user = User::where('provider_id', $githubUser->getId())->first();
    //
    //     if(!$user) {
    //       // add user
    //       $user = User::create([
    //         'email' => $githubUser->getEmail(),
    //         'name' => $githubUser->getName(),
    //         'provider_id' => $githubUser->getId(),
    //       ]);
    //     }
    //
    //     // login user
    //     Auth::login($user, true);
    //
    //     return redirect($this->redirectTo);
    // }
}
