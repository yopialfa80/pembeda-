<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\AuthControllers as Controller;
use \App\Models\User as M_User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;

class LoginControllers extends Controller
{
    public function AuthLogin(Request $request, LoginRequest $loginRequest)
		{
		  try {
			$request->validate([
			  'username' => 'required',
			  'password' => 'required'
			]);
            $usernameCredentials = request(['username', 'password']);
			if (!Auth::attempt($usernameCredentials)) {
			  return response()->json([
				'_status' => 401,
				'message' => 'Maaf, User tidak di temukan'
			  ]);
			}
			$user = M_User::where('username', $request->username)->first();
			if ( ! Hash::check($request->password, $user->password, [])) {
			   throw new \Exception('Maaf, Password anda salah');
			}
            $tokenResult = $user->createToken('authToken')->plainTextToken;
			$loginRequest->authenticate();
			$loginRequest->session()->regenerate();
			
			return response()->json([
			  '_status' => 200,
			  '_token' => $tokenResult,
              'token_type' => 'Bearer',
              'roles' => $user->roles,
              'message' => 'Selamat datang kembali ' . $user->name,
			]);
		  } catch (Exception $error) {
			return response()->json([
			  '_status' => 500,
              'message' => $error->getMessage(),
			  'error' => $error,
			]);
		  }
		}

		public function AuthLogout(Request $request)
		{
			Auth::guard('web')->logout();

			$request->session()->invalidate();

			$request->session()->regenerateToken();

			Auth::logout();

			return redirect('/');
		}
}
