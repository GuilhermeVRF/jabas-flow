<?php

namespace App\Http\Services\Auth;

use App\User;

class UserService{
    public function index(){
        return view('auth.register');
    }
}