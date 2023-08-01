<?php

namespace App\Http\Controllers\Api;

use App\Enums\ErrorType;
use App\Enums\SuccessType;
use App\Http\Requests\Source\CreateRequest;
use App\Http\Requests\Source\UpdateRequest;
use App\Http\Resources\SourceResource;
use App\Services\SourceService;

class SourceController extends BaseController
{
    protected SourceService $sourceService;

    public function __construct(SourceService $sourceService)
    {
        $this->sourceService = $sourceService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $sources = $this->sourceService->getAll();

        return $this->sendSuccess(SourceResource::collection($sources), __('response.success'));
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
            'source_name',
        ]);

        $create = $this->sourceService->create($data);

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
        $source = $this->sourceService->detail($id);

        if (!$source) return $this->sendError(ErrorType::CODE_4041, ErrorType::STATUS_4041, __('errors.MSG_4041'));

        return $this->sendSuccess(new SourceResource($source), __('response.success'));
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
            'source_name',
        ]);

        $updated = $this->sourceService->update($id, $data);

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
        $delete = $this->sourceService->delete($id);

        if (!$delete) return $this->sendError(ErrorType::CODE_5005, ErrorType::STATUS_5005, __('errors.MSG_5005'));

        return $this->sendSuccessNoData(SuccessType::CODE_200, __('response.deleted'));
    }
}
