<?php

namespace App\Http\Controllers\Auth;

use App\Check_moders;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Moders;

class LoginController extends Controller
{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Redirect the user to the Vkontakte authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::with('vkontakte')->redirect();
    }

    /**
     * Obtain the user information from Vkontakte.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('vkontakte')->user();
        $authUser = $this->findUser($user->getId());
//        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }

    public function findUser($user)
    {
        //Здесь нужно определить пользователя (пока не реализованно)
        $idModer = Moders::where('vk_id_mod', $user)->value('id_mod');
        if ($idModer) {
            return $idModer;
        }
    }
}
