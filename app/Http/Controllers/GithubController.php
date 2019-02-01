<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\User;

class GithubController extends Controller
{
    protected $redirectTo = '/home';
    protected $provider = 'GitHub';

    public function redirect() {
      return Socialite::driver('github')->redirect();
    }

    public function callback() {
      $gitUser = Socialite::driver('github')->user();

      $user = User::where('provider_id', $gitUser->getId())->first();

      // add user
      if(!$user) {
        $user = User::create([
          'name' => $gitUser->getName(),
          'email' => $gitUser->getEmail(),
          'provider' => $this->provider,
          'provider_id' => $gitUser->getId(),
        ]);
      }

      // login user
      Auth::login($user, true);

      return redirect($this->redirectTo);
    }
}
