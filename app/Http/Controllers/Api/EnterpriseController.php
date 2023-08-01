<?php

namespace App\Http\Controllers\Api;

use App\Enums\ErrorType;
use App\Enums\SuccessType;
use App\Http\Requests\Enterprise\CreateRequest;
use App\Http\Requests\Enterprise\UpdateRequest;
use App\Http\Resources\EnterpriseResource;
use App\Services\EnterpriseService;

class EnterpriseController extends BaseController
{
    protected EnterpriseService $enterpriseService;

    public function __construct(EnterpriseService $enterpriseService)
    {
        $this->enterpriseService = $enterpriseService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $enterprises = $this->enterpriseService->getAll();

        return $this->sendSuccess(EnterpriseResource::collection($enterprises), __('response.success'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateRequest $request)
    {
        $data = $request->only([
            'enterprise_name',
            'enterprise_email',
            'phone',
            'address',
        ]);

        // For test only. Change when integrate payment
        $data['max_account_created'] = 10;

        $create = $this->enterpriseService->create($data);

        if (!$create) {
            return $this->sendError(ErrorType::CODE_5006, ErrorType::STATUS_5006, __('errors.MSG_5006'));
        }

        return $this->sendSuccessNoData(SuccessType::CODE_201, __('response.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $enterprise = $this->enterpriseService->detail($id);

        if (!$enterprise) return $this->sendError(ErrorType::CODE_4041, ErrorType::STATUS_4041, __('errors.MSG_4041'));

        return $this->sendSuccess(new EnterpriseResource($enterprise), __('response.success'));
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
            'enterprise_name',
            'enterprise_email',
            'phone',
            'address',
            'max_account_created',
            'is_active',
        ]);

        $updated = $this->enterpriseService->update($id, $data);

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
        $delete = $this->enterpriseService->delete($id);

        if (!$delete) return $this->sendError(ErrorType::CODE_5005, ErrorType::STATUS_5005, __('errors.MSG_5005'));

        return $this->sendSuccessNoData(SuccessType::CODE_200, __('response.deleted'));
    }
}
