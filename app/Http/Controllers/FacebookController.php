<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\User;

class FacebookController extends Controller
{
    protected $redirectTo = '/home';
    protected $provider = 'Facebook';

    public function redirect() {
      return Socialite::driver('facebook')->redirect();
    }

    public function callback() {
      $fbUser = Socialite::driver('facebook')->user();

      $user = User::where('provider_id', $fbUser->getId())->first();

      // add user
      if(!$user) {
        $user = User::create([
          'name' => $fbUser->getName(),
          'email' => $fbUser->getEmail(),
          'provider' => $this->provider,
          'provider_id' => $fbUser->getId(),
        ]);
      }

      // login user
      Auth::login($user, true);

      return redirect($this->redirectTo);
    }
}
