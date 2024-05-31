<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Services\CandidateTestingApi;

class AuthController extends Controller
{
    public function Login(Request $request, CandidateTestingApi $api)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $responseData = $api->login($request->email, $request->password);

        if ($responseData) {
            \DB::table('users')->updateOrInsert(
                [
                    'email' => $responseData['user']['email'],
                ],
                [
                    'name' => $responseData['user']['first_name'] . ' ' . $responseData['user']['last_name'],
                    'password' => $responseData['token_key'],
                ],
            );

            $user_id =  \DB::table('users')->where('email', $responseData['user']['email'])->first()?->id;

            \DB::table('royal_app_tokens')->insert([
                'user_id' =>  $user_id,
                'token_id' =>  $responseData['id'],
                'token_key' => $responseData['token_key'],
                'refresh_token_key' => $responseData['refresh_token_key'],
                'expires_at' =>  $responseData['expires_at'],
                'refresh_expires_at' => $responseData['refresh_expires_at'],
                'last_active_date' => $responseData['last_active_date'],
            ]);



            Session::put('user_id', $responseData['user']['id']);
            Session::put('auth_token', $responseData['token_key']);
            Session::put('user_name', $responseData['user']['first_name'] . ' ' . $responseData['user']['last_name']);


            return redirect('authors');
        } else {
            return redirect('/')->with('error-message', 'Wrong email or password!');
        }
    }
}
