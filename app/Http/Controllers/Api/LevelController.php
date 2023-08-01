<?php

namespace App\Http\Controllers\Api;

use App\Enums\ErrorType;
use App\Enums\SuccessType;
use App\Http\Requests\Level\CreateRequest;
use App\Http\Requests\Level\UpdateRequest;
use App\Http\Resources\LevelResource;
use App\Services\LevelService;
use Illuminate\Http\Request;

class LevelController extends BaseController
{
    protected LevelService $levelService;

    public function __construct(LevelService $levelService)
    {
        $this->levelService = $levelService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $levels = $this->levelService->getAll();

        return $this->sendSuccess(LevelResource::collection($levels), __('response.success'));
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
            'level_name',
            'public_type_id',
        ]);

        $data['user_id'] = $this->getUserId();
        $data['enterprise_id'] = $this->getUserEnterpriseId();

        $create = $this->levelService->create($data);

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
        $level = $this->levelService->detail($id);

        if (!$level) return $this->sendError(ErrorType::CODE_4041, ErrorType::STATUS_4041, __('errors.MSG_4041'));

        return $this->sendSuccess(new LevelResource($level), __('response.success'));
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
            'level_name',
            'public_type_id',
            'is_active',
        ]);

        $data['user_id'] = $this->getUserId();
        $data['enterprise_id'] = $this->getUserEnterpriseId();

        $updated = $this->levelService->update($id, $data);

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
        $delete = $this->levelService->delete($id);

        if (!$delete) return $this->sendError(ErrorType::CODE_5005, ErrorType::STATUS_5005, __('errors.MSG_5005'));

        return $this->sendSuccessNoData(SuccessType::CODE_200, __('response.deleted'));
    }
}
