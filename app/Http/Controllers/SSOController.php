<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Token;

class SSOController extends Controller
{
    // Step 1: Issue token for logged-in user
    public function token(Request $request)
    {
        $user = $request->user();

        $tokenResult = $user->createToken('sso-token');

        return response()->json([
            'token' => $tokenResult->accessToken,
            'user'  => $user->email
        ]);
    }

    // Step 2: Accept token and log user in
    public function login(Request $request)
{
    $token = $request->token;

    if (!$token) {
        abort(401, 'Token missing');
    }

    // Ask Ecom to verify token
    $response = Http::withToken($token)
        ->get('https://ecom-app.rana.my.id/api/sso/user');

    if (!$response->ok()) {
        abort(401, 'Token invalid from Ecom');
    }

    $remoteUser = $response->json();

    // Match or create local user
    $user = User::firstOrCreate(
        ['email' => $remoteUser['email']],
        [
            'name' => $remoteUser['name'] ?? 'SSO User',
            'password' => bcrypt(str()->random(16))
        ]
    );

    Auth::login($user);

    return redirect('/dashboard');
}
}
