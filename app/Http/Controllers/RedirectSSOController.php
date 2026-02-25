<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RedirectSSOController extends Controller
{
   public function toFood(Request $request)
{
    $user = $request->user();

    if (!$user) {
        abort(401);
    }

    // IMPORTANT: store token result first
    // $tokenResult = $user->createToken('sso-token');
    $token = $user->createToken('sso')->plainTextToken;


    return redirect('https://food-app.rana.my.id/sso/login?token='.$token);
}
}
