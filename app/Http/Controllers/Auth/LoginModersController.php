<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Moders;

class LoginModersController extends Controller
{

    use AuthenticatesUsers;


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
        $authUser = $this->findModer($user);
        Auth::login($authUser, true);
        return redirect($this->redirectTo());//что-то здесь не чисто
    }

    public function findModer($user)
    {
        $authModer = Moders::where('vk_id_mod', $user->id)->first();
        if ($authModer) {
            return $authModer;
        }
    }
}
