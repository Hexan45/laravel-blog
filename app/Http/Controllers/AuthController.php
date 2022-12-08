<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    public function emailVerify(string $token) : mixed {

        if(strlen($token) !== 32) 
            return redirect()
                ->route('user.login')
                ->with('status', [
                    'type' => 'warning',
                    'header' => 'Podano błędny token',
                    'message' => 'Czy jesteś pewien, że token jest prawidłowy? Upewnij się, że zostałeś przekierowany tutaj ze skyrznki odbiorczej swojego emaila po kliknięciu przycisku aktywacji konta. Jeśli tak, powiadom administratora serwisu, który pomoże rozwiązać Twój problem.'
                ]);

        $selectedUser = User::where('email_verify_token', $token)->first();

        if(!$selectedUser)
            return redirect()
                ->route('user.login')
                ->with('status', [
                    'type' => 'warning',
                    'header' => 'Podano błędny token',
                    'message' => 'Czy jesteś pewien, że token jest prawidłowy? Upewnij się, że zostałeś przekierowany tutaj ze skyrznki odbiorczej swojego emaila po kliknięciu przycisku aktywacji konta. Jeśli tak, powiadom administratora serwisu, który pomoże rozwiązać Twój problem.'
                ]);

        $selectedUser->update([
            'email_verify_token' => '',
            'email_confirmed' => true
        ]);

        return redirect()
            ->route('user.login')
            ->with('status', [
                'type' => 'success',
                'header' => 'Konto zostało aktywowane',
                'message' => 'Sukces! Twoje konto zostało aktywowane, teraz możesz przystąpić do logowania, aby zacząć korzystać z serwisu'
            ]);

    }

    public function logout() {

            //Destroy user instance from auth class, destroy data from session and regenerate CSRF session token
        Auth::logout();
        Session::flush();
        Session::token();

        return back()
            ->with('status', [
                'type' => 'notice',
                'header' => 'Pomyślnie wylogowano z konta',
                'message' => 'Zostałeś wylogowany z ówczesnego konta, nie posiadasz już uprawnień zalogowanego użytkownika'
            ]);
    }
}
