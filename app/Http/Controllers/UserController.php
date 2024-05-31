<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Services\CandidateTestingApi;

class UserController extends Controller
{
    public function profile(Request $request, CandidateTestingApi $api)
    {
        $responseData = $api->profile(Session::get('auth_token'), Session::get('user_id'));
        if ($responseData) {
            return view('user.index')->with('user', $responseData);
        } else {
            return redirect('/')->with('error-message', 'Wrong email or password!');
        }
    }
}
