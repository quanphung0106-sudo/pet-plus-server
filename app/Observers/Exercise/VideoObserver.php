<?php

namespace App\Observers\Exercise;

use App\Models\Exercise;
use App\Services\ExerciseService;
use App\Services\VideoService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class VideoObserver
{
    protected $userId;
    protected $enterpriseId;
    protected ExerciseService $exerciseService;
    protected VideoService $videoService;

    public function __construct(VideoService $videoService, ExerciseService $exerciseService)
    {
        $this->userId = Auth::user()->id;
        $this->enterpriseId = Auth::user()->enterprise_id;
        $this->videoService = $videoService;
        $this->exerciseService = $exerciseService;
    }

    /**
     * Handle the Exercise "created" event.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return void
     */
    public function created(Exercise $exercise)
    {
        //
    }

    public function saving(Exercise $exercise)
    {
        if (!request()->has('video')) {
            $countVideo = $this->exerciseService->countVideo($exercise->video_id);
            $videoId = $exercise->video_id;
            $videoUrl = $exercise->video->url ?? "";

            $exercise->video()->dissociate()->saveQuietly();

            if ($countVideo == 1) {
                $url = str_replace("storage", "public", $videoUrl);

                Storage::delete($url);
                $this->videoService->delete($videoId);
            }
            $exercise->video()->dissociate()->saveQuietly();
        } else {
            // Delete old video
            if ($exercise->id) {
                $url = str_replace("storage", "public", $exercise->video->url ?? "");

                Storage::delete($url);
            }

            $videoData = [
                'video_name' => request()->video_name,
                'user_id' => $this->userId,
                'enterprise_id' => $this->enterpriseId,
            ];

            if (request()->hasFile('video')) {
                $videoData['url'] = request()->video->store(Config::get('define.videoPath'));
            } else {
                $videoData['url'] = request()->video;
            }

            $videoId = $exercise->video_id;

            if ($videoId) {
                $this->videoService->update($videoId, $videoData);
            } else {
                $video = $this->videoService->create($videoData);

                $exercise->video()->associate($video)->saveQuietly();
            }
        }
    }

    /**
     * Handle the Exercise "updated" event.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return void
     */
    public function updated(Exercise $exercise)
    {
        //
    }

    /**
     * Handle the Exercise "deleted" event.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return void
     */
    public function deleted(Exercise $exercise)
    {
        $countVideo = $this->exerciseService->countVideo($exercise->video_id);

        if (!$countVideo) {
            $url = str_replace("storage", "public", $exercise->video->url ?? "");

            Storage::delete($url);
            $this->videoService->delete($exercise->video_id);
        }
    }

    /**
     * Handle the Exercise "restored" event.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return void
     */
    public function restored(Exercise $exercise)
    {
        //
    }

    /**
     * Handle the Exercise "force deleted" event.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return void
     */
    public function forceDeleted(Exercise $exercise)
    {
        //
    }
}
