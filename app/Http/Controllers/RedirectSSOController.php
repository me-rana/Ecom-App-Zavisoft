<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RedirectSSOController extends Controller
{
    public function toFood(Request $request)
    {
        // Get logged-in user from Jetstream session
        $user = $request->user();

        if (!$user) {
            abort(401, 'User not logged in');
        }

        // Create Passport token directly
        $token = $user->createToken('sso-token')->accessToken;

        // Redirect to Food app with token
        return redirect('https://food-app.rana.my.id/sso/login?token=' . $token);
    }
}
