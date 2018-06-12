<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Moders;

class ModersController extends Controller
{
    public function findModer($user)
    {
        
        $authModer = Moders::where('vk_id_mod', $user->id)->first();
        if ($authModer) {
            return $authModer;
        }
    }

}
