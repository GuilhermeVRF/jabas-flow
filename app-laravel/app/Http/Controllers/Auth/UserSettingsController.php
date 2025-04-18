<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserSettingsRequest;
use App\Http\Services\Auth\UserSettingsService;
use Illuminate\Http\Request;

class UserSettingsController extends Controller
{
    private $userSettingsService;

    public function __construct(UserSettingsService $userSettingsService)
    {
        $this->userSettingsService = $userSettingsService;
    }

    public function index(){
        return $this->userSettingsService->index();
    }

    public function update(UserSettingsRequest $request){
        return $this->userSettingsService->update($request);
    }
}
