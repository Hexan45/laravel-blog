<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function login() : mixed {
        return view('login');
    }

    private function loginValidator(Request $request) {
        return Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);
    }

    public function loginAuth(Request $request) : mixed {
            //Register login validator
        $loginValidator = $this->loginValidator($request);

            //Redirect back with input email and logs errors from validator class
        if($loginValidator->fails()) {
            return back()
                ->withErrors($loginValidator)
                ->onlyInput('username');
        }

            //Getting validated data from Validator class
        $validatedData = $loginValidator->validated();

            //Authentication user
        if(Auth::attempt([
            ((filter_var($validatedData['username'], FILTER_VALIDATE_EMAIL)) ? 'email' : 'nickname') => $validatedData['username'],
            'password' => $validatedData['password'],
            'email_confirmed' => 1])) {

            session()->regenerate();

            return redirect()->intended('/');
        }

        return back()
            ->onlyInput('username')
            ->with('status', [
                'type' => 'warning',
                'header' => 'Niepowodzenie logowania',
                'message' => 'Nie odnaleziono konta z podanymi danymi, upewnij się że potwierdziłeś podany w procesie rejetracji adres email oraz czy podałeś prawidłowe dane w polu poniżej'
            ]);

    }
}
