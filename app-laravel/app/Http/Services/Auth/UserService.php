<?php

namespace App\Http\Services\Auth;

use App\Http\Requests\Auth\UserRequest;
use App\Jobs\SendVerificationEmailJob;
use App\Models\User;

class UserService{
    public function index(){
        return view('auth.register');
    }

    public function store(UserRequest $request){
        $user = new User();
        $user->name = $request->name;
        $user->cpfcnpj = $request->cpfcnpj;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->verification_code = rand(100000, 999999) ;
        $user->verification_code_expires_at = now()->addMinutes(30);

        $user->save();

        session(['email' => $user->email]);

        SendVerificationEmailJob::dispatch($user);

        return redirect()->route('user.verifyEmailView');
    }
}