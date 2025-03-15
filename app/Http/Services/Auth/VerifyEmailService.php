<?php

namespace App\Http\Services\Auth;

use App\Models\User;
use App\Http\Requests\Auth\VerifyEmailRequest;
use App\Http\Requests\Auth\ResendEmailRequest;
use App\Jobs\SendVerificationEmailJob;

class VerifyEmailService{
    public function index(){
        return view('auth.verifyEmailCode');
    }

    public function verifyEmailCode(VerifyEmailRequest $request){
        $user = User::where('email', $request->email)->where('verification_code', $request->verification_code)->first();

        if($user === null){
            return redirect()->back()->with('error', 'Código de verificação inválido');
        }

        if($user->verification_code_expires_at < now()){
            return redirect()->back()->with('error', 'Código de verificação expirado');
        }

        $user->email_verified_at = now();
        $user->verification_code = null;
        $user->verification_code_expires_at = null;
        $user->save();

        return redirect()->route('login')->with('success', 'Email verificado com sucesso');
    }

    public function resendEmailCode(ResendEmailRequest $request){
        $user = User::where('email', $request->email)->first();

        if($user === null){
            return redirect()->back()->with('error', 'Email não encontrado');
        }

        $user->verification_code = rand(100000, 999999);
        $user->verification_code_expires_at = now()->addMinutes(30);
        $user->save();

        SendVerificationEmailJob::dispatch($user);

        return redirect()->back()->with('success', 'Código de verificação reenviado');
    }
}