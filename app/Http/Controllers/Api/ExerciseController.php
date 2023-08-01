<?php

namespace App\Http\Controllers\Api;

use App\Enums\ErrorType;
use App\Enums\SuccessType;
use App\Http\Requests\Exercise\CreateRequest;
use App\Http\Requests\Exercise\UpdateRequest;
use App\Http\Resources\ExerciseCollection;
use App\Http\Resources\ExerciseResource;
use App\Services\ExerciseService;
use Illuminate\Http\Request;

class ExerciseController extends BaseController
{
    protected ExerciseService $exerciseService;

    public function __construct(ExerciseService $exerciseService)
    {
        $this->exerciseService = $exerciseService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $params = $request->only(
            'source_id',
            'level_id',
            'subject_id',
            'exercise_part_id',
            'exercise_format_id',
            'exercise_units',
            'difficulty_level_id',
            'exercise_type_id',
            'status_id',
            'user_id',
            'enterprise_id',
            'public_type_id',
            'limit'
        );

        $exercises = $this->exerciseService->getListExercise($params);

        return $this->sendSuccess(new ExerciseCollection($exercises), __('response.success'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateRequest $request)
    {
        $data = $request->only([
            'content',
            'source_id',
            'level_id',
            'subject_id',
            'exercise_part_id',
            'exercise_format_id',
            'exercise_unit',
            'difficulty_level_id',
            'exercise_type_id',
            'status_id',
            'public_type_id',
            'video',
            'audio',
            'video_id',
            'audio_id',
            'answers',
        ]);

        $data['user_id'] = $this->getUserId();
        $data['enterprise_id'] = $this->getUserEnterpriseId();

        $create = $this->exerciseService->create($data);

        if (!$create) {
            return $this->sendError(ErrorType::CODE_5006, ErrorType::STATUS_5006, __('errors.MSG_5006'));
        }

        return $this->sendSuccessNoData(SuccessType::CODE_201, __('response.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $exercise = $this->exerciseService->detail($id);

        if (!$exercise) return $this->sendError(ErrorType::CODE_4041, ErrorType::STATUS_4041, __('errors.MSG_4041'));

        return $this->sendSuccess(new ExerciseResource($exercise), __('response.success'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->only([
            'content',
            'source_id',
            'level_id',
            'subject_id',
            'exercise_part_id',
            'exercise_format_id',
            'exercise_unit',
            'difficulty_level_id',
            'exercise_type_id',
            'status_id',
            'public_type_id',
            'video',
            'audio',
            'video_id',
            'audio_id',
            'is_active',
        ]);

        $data['user_id'] = $this->getUserId();
        $data['enterprise_id'] = $this->getUserEnterpriseId();

        $updated = $this->exerciseService->update($id, $data);

        if (!$updated) return $this->sendError(ErrorType::CODE_5004, ErrorType::STATUS_5004, __('errors.MSG_5004'));

        return $this->sendSuccessNoData(SuccessType::CODE_200, __('response.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $delete = $this->exerciseService->delete($id);

        if (!$delete) return $this->sendError(ErrorType::CODE_5005, ErrorType::STATUS_5005, __('errors.MSG_5005'));

        return $this->sendSuccessNoData(SuccessType::CODE_200, __('response.deleted'));
    }
}
