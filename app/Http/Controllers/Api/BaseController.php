<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Traits\ResponseApiHandle;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    use ResponseApiHandle;


    /**
     * Get guard
     *
     * @param $guardName
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function getGuard($guardName = 'api')
    {
        return Auth::guard($guardName);
    }

    protected function getUserId()
    {
        return $this->getGuard()->user()->id;
    }

    protected function getUserEnterpriseId()
    {
        return $this->getGuard()->user()->enterprise_id;
    }

    /**
     * @param $result
     * @param $message
     * @return JsonResponse
     */
    protected function sendSuccess($data = null, $message = null): JsonResponse
    {
       return $this->responseSuccess($data, $message);
    }

    protected function sendSuccessNoData($code = 200, $message = null): JsonResponse
    {
        return $this->responseSuccessNoData($code, $message);
    }

    protected function sendError($code = 5000, $statusCode = 500, $message = null): JsonResponse
    {
        return $this->responseError($code, $statusCode, $message);
    }
}
