<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LoginAPIController extends Controller
{
    public function login(Request $request)
    {

        $credentials['userLyId'] = $request->input('email');
        $credentials['password'] = $request->input('password');

        if (! Auth::attempt($credentials)) {
            return [
                'message' => 'Invalid credentials',
                'errors' => (object) []
            ];
        }

        $userInfo = $request->user();

        if ($userInfo != null) {

            $data = [
                'grant_type' => 'password',
                'client_id' => 'your_client_id',
                'client_secret' => 'your_client_secret',
                'username' => 'your_username',
                'password' => 'your_password',

            ];

            $response = Http::post('http://your-api-url/oauth/token', $data);
            $accessToken = $response->json()['access_token'];

            // Use the access token in subsequent API requests:
            $response = Http::withToken($accessToken)->get('http://your-api-url/user');
            $user = $response->json();

            return $user;
        } else {
            return [
                'message' => 'No User found.',
                'errors' => (object) []
            ];
        }
    }
}
