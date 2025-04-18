<?php

namespace App\Http\Services\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginService{
    public function index(){
        return view('auth.login');
    }

    public function login(LoginRequest $request){
        $hashedPassword = bcrypt($request->password);
        $user = User::where('email', $request->email)->first();

        if($user === null){
            return redirect()->back()->withErrors(['error' => 'Usuário ou senha inválidos']);
        }

        if(!password_verify($request->password, $user->password)){
            return redirect()->back()->withErrors(['error' => 'Usuário ou senha inválidos']);
        }

        // Verificar se o email está verificado ?

        Auth::login($user, $request->rememberMe);

        return redirect()->route('dashboard')->with('success', 'Login efetuado com sucesso');
    }
}