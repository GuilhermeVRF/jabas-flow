<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\VerifyEmailRequest;
use App\Http\Requests\Auth\ResendEmailRequest;
use App\Http\Controllers\Controller;
use App\Http\Services\Auth\VerifyEmailService;

class VerifyEmailController extends Controller
{
    private $verifyEmailService;

    public function __construct(VerifyEmailService $verifyEmailService){
        $this->verifyEmailService = $verifyEmailService;
    }

    public function index(){
        return $this->verifyEmailService->index();
    }

    public function verifyEmailCode(VerifyEmailRequest $request){
        return $this->verifyEmailService->verifyEmailCode($request);
    }

    public function resendEmailCode(ResendEmailRequest $request){
        return $this->verifyEmailService->resendEmailCode($request);
    }
}