<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToSocialite($driver){
        return Socialite::driver($driver)->redirect();
    }

    public function handleSocialiteCallback($driver){
        $user = Socialite::driver($driver)->user();
        $this->registerOrLoginUser($user);
        return redirect()->route('login')->withSuccess('Login completed');
    }

    protected function registerOrLoginUser($data)
    {
        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name ?? $data->nickname ?? 'No Name';
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->password = bcrypt(Str::random(22));
            $user->save();
        }
        Auth::login($user);
    }
}
