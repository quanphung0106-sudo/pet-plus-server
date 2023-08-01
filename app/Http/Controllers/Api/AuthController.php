<?php

namespace App\Http\Controllers\Api;

use App\Enums\ErrorType;
use App\Enums\SuccessType;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use App\Http\Controllers\Api\BaseController;

class AuthController extends BaseController
{
    protected UserService $userService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $user = $this->userService->getUserByEmail($credentials['email']);

        if (!$user) return $this->sendError(ErrorType::CODE_4010, ErrorType::STATUS_4010, trans('errors.MSG_4010'));

        if (!$token = $this->getGuard()->attempt($credentials)) {
            return $this->sendError(ErrorType::CODE_4010, ErrorType::STATUS_4010, trans('errors.MSG_4010'));
        }

        return $this->respondWithToken($token);
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->only([
            'email',
            'password',
            'name',
            'birthday',
            'phone',
            'address',
            'gender',
        ]);

        $register = $this->userService->register($data);

        if (!$register) {
            return $this->sendError(ErrorType::CODE_5003, ErrorType::STATUS_5003, __('errors.MSG_5003'));
        }

        return $this->sendSuccessNoData(SuccessType::CODE_201, __('response.created'));
    }

    protected function respondWithToken($token)
    {
        $data = [
            'token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => $this->getGuard()->factory()->getTTL()
        ];

        return $this->sendSuccess($data, __('response.success'));
    }

    public function myInfo()
    {
        $user = $this->getGuard()->user();

        return new UserResource($user);
    }

    public function logout()
    {
        $this->getGuard()->logout();

        return $this->sendSuccess(true, __('response.success'));
    }

    public function refresh() {
        return $this->respondWithToken(auth()->refresh());
    }
}
