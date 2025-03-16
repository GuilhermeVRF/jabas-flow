<?php

namespace App\Http\Services\Auth;

use App\Models\User;
use App\Http\Requests\Auth\VerifyEmailRequest;
use App\Http\Requests\Auth\ResendEmailRequest;
use App\Jobs\SendVerificationEmailJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

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

        Auth::login($user);

        return redirect()->route('login')->with('success', 'Email verificado com sucesso');
    }

    public function resendEmailCode(ResendEmailRequest $request){
        if($this->alreadySentVerificationEmail($request->email)){
            return redirect()->back()->withErrors(['error' => 'Aguarde 1 minuto para reenviar o código de verificação']);
        }

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

    private function alreadySentVerificationEmail($email){
        $lastVerifyEmailTime = Cache::get("lastVerifyEmailTime-$email", null);
        
        if($lastVerifyEmailTime === null){
            return false;
        }

        return now()->diffInMinutes($lastVerifyEmailTime) < 1;
    }
}