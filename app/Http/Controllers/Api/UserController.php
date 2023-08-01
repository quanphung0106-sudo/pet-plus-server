<?php

namespace App\Http\Controllers\Api;

use App\Enums\ErrorType;
use App\Enums\SuccessType;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends BaseController
{
    private UserService $userService;

    /**
     * Create a new rule instance.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $users = $this->userService->getAll();

        return $this->sendSuccess(UserResource::collection($users), __('response.success'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $user = $this->userService->detail($id);

        if (!$user) return $this->sendError(ErrorType::CODE_4041, ErrorType::STATUS_4041, __('errors.MSG_4041'));

        return $this->sendSuccess(new UserResource($user), __('response.success'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->only([
            'email',
            'name',
            'birthday',
            'phone',
            'address',
            'gender',
            'enterprise_id',
            'is_active',
        ]);

        $updated = $this->userService->update($id, $data);

        if (!$updated) return $this->sendError(ErrorType::CODE_5004, ErrorType::STATUS_5004, __('errors.MSG_5004'));

        return $this->sendSuccessNoData(SuccessType::CODE_200, __('response.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $delete = $this->userService->delete($id);

        if (!$delete) return $this->sendError(ErrorType::CODE_5005, ErrorType::STATUS_5005, __('errors.MSG_5005'));

        return $this->sendSuccessNoData(SuccessType::CODE_200, __('response.deleted'));
    }
}
