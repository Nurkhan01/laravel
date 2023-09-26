<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AMQP\AMQPBaseController;
use App\Jobs\UserRegisterJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends AMQPBaseController
{
    public function register(Request $request)
    {
        $displayName = 'ProcessDataJob';

        UserRegisterJob::dispatch(['data' => 1], $displayName)->onQueue('user');


        return response()->json([
            'message' => 'User registered successfully'
        ], 200);

        $validatedData = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'name' => 'required|min:6',
        ]);
        $user = User::create([
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'name' => $validatedData['name'],
        ]);
<<<<<<< HEAD
//        UserRegisterJob::dispatch($user->toArray());
//        dispatch((new UserRegisterJob($user->toArray())))->onQueue('user_queue');
        $this->amqpService->publishMessage($user);
=======

        $displayName = 'ProcessDataJob';

        UserRegisterJob::dispatch($user->toArray(), $displayName)->onQueue('user');
>>>>>>> aa83dcb099deb332c04ee06e8ce8046004cf4794
        return response()->json([
            'message' => 'User registered successfully'
        ], 200);
    }
}
