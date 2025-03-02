<?php

namespace App\Http\Services\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\VerifyEmail;

class UserService{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->cpfcnpj = $request->cpfcnpj;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->verification_code = rand(100000, 999999) ;
        $user->verification_code_expires_at = now()->addMinutes(30);

        $user->save();
        $user->notify(new VerifyEmail());

        session(['email' => $user->email]);

        return redirect()->route('user.verifyEmailView');
    }
}