<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
       
                $google_user = Socialite::driver('google')->user();
                $user = User::where('google_id', $google_user->getId())->first();
                if (!$user) {
                    $new_user = new User();
                    $new_user->name = $google_user->getName();
                    $new_user->email = $google_user->getEmail();
                    $new_user->google_id = $google_user->getId();
                    if ($new_user->save()) {
                        Auth::login($new_user);
                        return redirect()->to('dashboard');
                    }
                } else {
                    Auth::login($user);
                    return redirect()->to('dashboard');
                }
    }

    public function showForm()
    {
        return view('socialmedialogin');
    }

    public function showDashboard()
    {
        return view('socialmediadashbord'); 
    }

    public function redirectToGitHub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGitHubCallback()
    {
       
                $git_user = Socialite::driver('github')->user();
                $user = User::where('github_id', $git_user->getId())->first();
                if (!$user) {
                    $new_user = new User();
                    $new_user->name = $git_user->getName();
                    $new_user->email = $git_user->getEmail();
                    $new_user->github_id = $git_user->getId();
                    if ($new_user->save()) {
                        Auth::login($new_user);
                        return redirect()->to('dashbordforgithubusers');
                    }
                } else {
                    Auth::login($user);
                    return redirect()->to('dashbordforgithubusers');
                }
    }

    public function showgitdashbord()
    {
        return view('gitdashbord'); 
    }
    
}
