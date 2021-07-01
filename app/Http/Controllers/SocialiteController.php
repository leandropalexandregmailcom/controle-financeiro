<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Factory\LoginProviderFactory;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    private $factory;

    function __construct(LoginProviderFactory $factory)
    {
        $this->factory = $factory;
    }

    public function redirect($provider)
    {
        return Socialite::driver($this->factory->createProvider($provider))->redirect();
    }

    public function callbackFacebook()
    {
        $userProvider = Socialite::driver('facebook')->user();

        $user = User::firstOrCreate(['email' =>$userProvider->email], [
            'name' => $userProvider->name ?? $userProvider->nickname,
            'id_provider' => $userProvider->id,
            'provider' => 'facebook'
        ]);

        Auth::login($user);

        return redirect()->route('home.user');
    }
}
