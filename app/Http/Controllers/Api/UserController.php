<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function informationuser(InformationUser $request)
    {
       $user = new User ();

       $user -> name_user = $request -> name_user;
       $user -> email_user = $request -> email_user;
       $user -> password_user = $request -> password_user;
       $user -> save ();
      }


}

