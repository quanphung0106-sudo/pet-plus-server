<?php

namespace App\Http\Controllers\Api;

use App\Enums\ErrorType;
use App\Enums\SuccessType;
use App\Http\Requests\ExercisePart\CreateRequest;
use App\Http\Requests\ExercisePart\UpdateRequest;
use App\Http\Resources\ExercisePartResource;
use App\Services\ExercisePartService;
use Illuminate\Http\Request;

class ExercisePartController extends BaseController
{
    protected ExercisePartService $exercisePartService;

    public function __construct(ExercisePartService $exercisePartService)
    {
        $this->exercisePartService = $exercisePartService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $exerciseParts = $this->exercisePartService->getAll();

        return $this->sendSuccess(ExercisePartResource::collection($exerciseParts), __('response.success'));
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
            'exercise_part_name',
            'subject_id',
            'public_type_id',
        ]);

        $data['user_id'] = $this->getUserId();
        $data['enterprise_id'] = $this->getUserEnterpriseId();

        $create = $this->exercisePartService->create($data);

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
        $exercisePart = $this->exercisePartService->detail($id);

        if (!$exercisePart) return $this->sendError(ErrorType::CODE_4041, ErrorType::STATUS_4041, __('errors.MSG_4041'));

        return $this->sendSuccess(new ExercisePartResource($exercisePart), __('response.success'));
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
            'exercise_part_name',
            'subject_id',
            'public_type_id',
            'is_active',
        ]);

        $data['user_id'] = $this->getUserId();
        $data['enterprise_id'] = $this->getUserEnterpriseId();

        $updated = $this->exercisePartService->update($id, $data);

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
        $delete = $this->exercisePartService->delete($id);

        if (!$delete) return $this->sendError(ErrorType::CODE_5005, ErrorType::STATUS_5005, __('errors.MSG_5005'));

        return $this->sendSuccessNoData(SuccessType::CODE_200, __('response.deleted'));
    }
}
