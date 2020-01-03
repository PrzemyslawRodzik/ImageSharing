<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function store(User $user) //uzytkownik ktory nas followuje, nie auth user
    {
            return auth()->user()->following()->toggle($user->profile);
    }
}
