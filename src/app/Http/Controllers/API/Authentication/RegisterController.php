<?php

namespace App\Http\Controllers\API\Authentication;

use App\{Http\Controllers\Controller, Models\User};
use Illuminate\{Foundation\Auth\RegistersUsers,
    Http\JsonResponse,
    Http\Request,
    Support\Facades\Hash,
    Support\Facades\Validator
};

class RegisterController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default, this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return User
     */
    public function create(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * The user has been registered.
     *
     * @param Request $request
     * @param mixed $user
     * @return JsonResponse
     */
    protected function registered(Request $request, User $user): JsonResponse
    {
        return response()->json([
            'message' => 'User registered successfully',
            'userMessage' => 'Congratulations registered successfully',
            'data' => [
                'token' => $user->createToken(User::TokenName)->plainTextToken,
            ],
        ]);
    }
}
