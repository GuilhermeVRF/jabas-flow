<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Services\Auth\LoginService;

class LoginController extends Controller
{
    private $loginService;

    public function __construct(LoginService $loginService){
        $this->loginService = $loginService;
    }

    public function index(){
        return $this->loginService->index();
    }

    public function login(LoginRequest $request){
        return $this->loginService->login($request);
    }
}
