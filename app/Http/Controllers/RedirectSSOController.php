<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RedirectSSOController extends Controller
{
    public function toFood(Request $request)
    {
        // Call own project token endpoint (user already logged via Jetstream)
        $response = Http::withCookies($request->cookies->all(), null)
            ->get('https://ecom-app.rana.my.id//sso/token');

        $token = $response->json()['token'];

        // Redirect to other project with token
        return redirect('https://food-app.rana.my.id/sso/login?token='.$token);
    }
}
