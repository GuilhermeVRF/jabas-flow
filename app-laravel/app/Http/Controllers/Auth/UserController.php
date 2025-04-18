<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserRequest;
use App\Http\Services\Auth\UserService;

class UserController extends Controller{
    private $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function index(){
        return $this->userService->index();
    }

    public function store(UserRequest $request){
        return $this->userService->store($request);
    }
}
