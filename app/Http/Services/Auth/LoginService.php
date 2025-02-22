<?php

namespace App\Http\Services\Auth;

use App\Models\User;

class LoginService{
    public function index(){
        return view('auth.login');
    }
}