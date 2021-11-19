<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;

class AuthController extends Controller
{
    /**
     * Login
     * @param  LoginRequest $request
     * @return mixed
     */
    public function login(LoginRequest $request)
    {
        $user = User::firstOrCreate('device_id', $request->device_id);

        $user->update([
            'device_token' => $request->device_token,
        ]);
    }

    /**
     * Logout
     * @return mixed
     */
    public function logout(Request $request)
    {
        $user = User::where('device_id', $request->device_id)->first();

        if (!$user) return $this->errorStatus('user not found');

        $user->update(['device_id' => null, 'device_token' => null]);

        return $this->successStatus(__('successfully logout'));
    }
}
