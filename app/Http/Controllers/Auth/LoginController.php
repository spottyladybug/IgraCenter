<?php

namespace App\Http\Controllers\Auth;

use App\Check_users;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

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
    public function handleProviderCallback( Request $request )
    {
        if( request( 'code' ) ) {
            $user = Socialite::driver('vkontakte')->user();

            $idUser = User::where('vk_id_user', $user->getId())->first();
            if (!$idUser) {
                return response()->json('User does not exist');
            }
            $authUser = Check_users::where('id_check_user', $idUser->id_user)->first();
            Auth::login($authUser, true);

            switch ($idUser->group_user) {
                case 1:
                    return view('Moders.moder');
                    break;
                case 2:
                    return view('Players.player');
                    break;
                case 100:
                    return view('Admin.admin');
                default:
                    return response()->json('Ошибка. Несуществующая группа пользователей');
            }
        } else {
            return view('main');
        }
    }

    /**
     * Some testing methods
     */
    public function testLoginRedirect()
    {
        return redirect( '/?code=123' );
    }

    public function testLogin( Request $request )
    {
        if( request( 'code' ) )
        {
            
        } else
        {
            return view('main');
        }
    }
}
