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
        $accessToken = $request->token;

        if (!$accessToken) {
            abort(401, 'Token missing');
        }

        // Extract token ID from Passport token format: id|hash
        $tokenId = explode('|', $accessToken)[0];

        $token = Token::find($tokenId);

        if (!$token || $token->revoked) {
            abort(401, 'Invalid token');
        }

        $user = $token->user;

        Auth::login($user);

        return redirect('/dashboard');
    }
}
