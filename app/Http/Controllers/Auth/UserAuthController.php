<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserAuthController extends Controller
{
    public function register(RegisterRequest $request) {

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone_number' => $request->phone_number,
            'email_verified_token' => Str::random(20)
        ];

        $user = User::query()->create($userData);

        Mail::to($user->email)->send(new VerifyEmail($user));

        return response()->json([
            'message' => 'Verify Email'
        ]);
    }

    public function login(LoginRequest $request) {
        $user = User::query()
            ->where('email', $request->email)
            ->first();

        $auth = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if(!$auth) {
            return response()->json([
                'message' => 'Password doesnt match'
            ]);
        }

        $token = auth()->user()->createToken('API Token')->accessToken;

        return response()->json([
            'message' => 'Success',
            'data' => ['user' => $user, 'token' => $token],
        ]);
    }

    public function verifyEmail(Request $request, $token)
    {
        $user = User::query()->where('email_verified_token', $token)->firstOrFail();

        $user->email_verified_at = now()->toDateTimeString();
        $user->email_verified_token = null;
        $user->save();

        return response()->json([
            'message' => 'Email Verified'
        ]);

    }
}
