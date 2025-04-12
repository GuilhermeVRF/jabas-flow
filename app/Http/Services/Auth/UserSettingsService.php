<?php

namespace App\Http\Services\Auth;

use App\Http\Requests\Auth\UserSettingsRequest;
use App\Models\UserSettings;

class UserSettingsService{
    public function index(){
        $userSettings = UserSettings::where('user_id', auth()->user()->id)->first();
        return view('auth.userSettings', ['userSettings' => $userSettings]);
    }

    public function update(UserSettingsRequest $request){
        UserSettings::updateOrCreate(
            ['user_id' => auth()->user()->id],
            ['email_notifications' => $request->email_notifications]
        );

        return redirect()->back()->with('success', 'Configuraçõs atualizadas com sucesso!');
    }
}