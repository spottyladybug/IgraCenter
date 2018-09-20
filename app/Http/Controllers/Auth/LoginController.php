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
        if( request( 'code' ) ) {
            $user = Socialite::driver('vkontakte')->user();
            $idUser = User::where('vk_id_user', $user->getId())->first();
            if (!$idUser) {
                return response()->json('User does not exist');
            }
            if( $user->getName() != $idUser->name_user ) {
                $idUser->name_user = $user->getName();
                $idUser->save();
            }

            $authUser = Check_users::firstOrCreate(['id_check_user' => $idUser->id_user]);
            Auth::login($authUser, true);

            switch ($idUser->group_user) {
                case 1:
                    if( \App\Settings::where('name', 'stop')->exists() ) {
                        return 'Игра окончена';
                    } else {
                        return redirect()->route('moder.home', ['id' => $idUser->id_user]);
                    }
                    break;
                case 2:
                    if( \App\Settings::where('name', 'stop')->exists() ) {
                        return 'Игра окончена';
                    } else {
                        return redirect()->route('players.home');
                    }
                    break;
                case 100:
                    return redirect()->route('admin.home');
                    break;
                default:
                    return response()->json('Ошибка. Несуществующая группа пользователей');
            } 
        } else {
            return view('main');
        }
    }
}
