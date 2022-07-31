<?php

namespace App\Http\Controllers\API\Authentication;

use App\{Http\Controllers\Controller, Models\User};
use Illuminate\{Foundation\Auth\AuthenticatesUsers, Http\JsonResponse, Http\Request};

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param Request $request
     * @return JsonResponse
     */
    protected function sendLoginResponse(Request $request): JsonResponse
    {
        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user());
    }

    /**
     * The user has been authenticated.
     *
     * @param Request $request
     * @param mixed $user
     * @return JsonResponse
     */
    protected function authenticated(Request $request, User $user): JsonResponse
    {
        return response()->json([
            'message' => 'User login successfully',
            'data' => [
                'token' => $user->createToken(User::TokenName)->plainTextToken,
            ],
        ]);
    }
}
