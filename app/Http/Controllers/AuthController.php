<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{

    public function register(Request $request) {
        $post_data = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|email|unique:users',
            'password'=>'required|min:8'
        ]);

        $user = User::create([
            'name' => $post_data['name'],
            'email' => $post_data['email'],
            'password' => Hash::make($post_data['password']),
        ]);

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function login(Request $request) {

      if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
              'message' => 'Login information is invalid.'
            ], 401);
      }

      $user = User::where('email', $request['email'])->firstOrFail();
      $token = $user->createToken('authToken')->plainTextToken;

      return response()->json([
        'access_token' => $token,
        'token_type' => 'Bearer',
      ]);
    }

    public function logout(Request $request)
    {
        // Get bearer token from the request
        $accessToken = $request->bearerToken();

        // Get access token from database
        $token = PersonalAccessToken::findToken($accessToken);

        // Revoke token
        $token->delete();
    }
}
