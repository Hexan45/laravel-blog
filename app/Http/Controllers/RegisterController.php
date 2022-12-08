<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use App\Mail\RegisterConfirm;
use App\Models\User;

class RegisterController extends Controller
{

    public function register() : mixed {
        return view('register');
    }

    private function storeFile(Request $request) : string {
        $file = $request->file('image_file');

        return Storage::disk('public')->putFileAs(
            'images', $file, $file->hashName()
        );
    }

    private function hashPassword(Request $request) : string {
        return Hash::make($request->password, [
            'memory' => 1024,
            'time' => 2
        ]);
    }

    private function registerValidator(Request $request) {

        return Validator::make($request->all(), [
            'nickname' => [
                'required',
                'min:5',
                'max:40',
                'unique:App\Models\User,nickname'
            ],
            'email' => [
                'required',
                'confirmed',
                'email',
                'unique:App\Models\User,email'
            ],
            'email_confirmation' => [
                'required'
            ],
            'password' => [
                'required',
                'confirmed',
                'min:7',
                (new Password(7))
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(2),
                'max:100'
            ],
            'password_confirmation' => [
                'required'
            ],
            'image_file' => [
                'required',
                'mimes:jpg,jpe,jpeg,png',
                'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
                'file',
                'max:4096'
            ]
        ]);

    }

    public function registerValidate(Request $request) : mixed {

            //Validate data from request by validator static method
        $registerValidator = $this->registerValidator($request);

            //Validation has failure
        if($registerValidator->fails()) {
            return back()
                ->withInput()
                ->withErrors($registerValidator);
        }

            //Getting validated data
        $validatedData = $registerValidator->validated();

            //Creating new user column in table
        $userData = User::create([
            'nickname' => $validatedData['nickname'],
            'email' => $validatedData['email'],
            'image_path' => $this->storeFile($request),
            'password' => $this->hashPassword($request),
            'email_verify_token' => Str::random(32)
        ]);

            //Sending mail and new user data to mailer
        Mail::to($userData->email)->send(new RegisterConfirm($userData));

            //Redirect to login page with flash notification
        return redirect()
            ->route('user.login')
            ->with('status', [
                'type' => 'notice',
                'header' => 'Potwierdź email',
                'message' => 'Wiadomość została wysłana na konto, sprawdź swoją skrzynkę i aktywuj konto'
            ]);

    }

}