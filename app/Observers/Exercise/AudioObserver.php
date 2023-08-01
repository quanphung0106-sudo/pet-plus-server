<?php

namespace App\Observers\Exercise;

use App\Models\Exercise;
use App\Services\AudioService;
use App\Services\ExerciseService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class AudioObserver
{
    protected $userId;
    protected $enterpriseId;
    protected ExerciseService $exerciseService;
    protected AudioService $audioService;

    public function __construct(AudioService $audioService, ExerciseService $exerciseService)
    {
        $this->userId = Auth::user()->id;
        $this->enterpriseId = Auth::user()->enterprise_id;
        $this->audioService = $audioService;
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
        if (!request()->has('audio')) {
            $countAudio = $this->exerciseService->countAudio($exercise->audio_id);
            $audioId = $exercise->audio_id;
            $audioUrl = $exercise->audio->url ?? "";

            $exercise->audio()->dissociate()->saveQuietly();

            if ($countAudio == 1) {
                $url = str_replace("storage", "public", $audioUrl);

                Storage::delete($url);
                $this->audioService->delete($audioId);
            }
            $exercise->audio()->dissociate()->saveQuietly();
        } else {
            // Delete old audio
            if ($exercise->id) {
                $url = str_replace("storage", "public", $exercise->audio->url ?? "");

                Storage::delete($url);
            }
            $audioData = [
                'audio_name' => request()->audio_name,
                'user_id' => $this->userId,
                'enterprise_id' => $this->enterpriseId,
            ];

            if (request()->hasFile('audio')) {
                $audioData['url'] = request()->audio->store(Config::get('define.audioPath'));
            } else {
                $audioData['url'] = request()->audio;
            }

            $audioId = $exercise->audio_id;

            if ($audioId) {
                $this->audioService->update($audioId, $audioData);
            } else {
                $audio = $this->audioService->create($audioData);

                $exercise->audio()->associate($audio)->saveQuietly();
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
        $countAudio = $this->exerciseService->countAudio($exercise->audio_id);

        if (!$countAudio) {
            $url = str_replace("storage", "public", $exercise->audio->url ?? "");

            Storage::delete($url);
            $this->audioService->delete($exercise->audio_id);
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
