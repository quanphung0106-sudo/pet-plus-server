<?php

namespace App\Observers\Exercise;

use App\Models\Exercise;
use App\Services\AnswerService;

class AnswerObserver
{
    protected AnswerService $answerService;

    public function __construct(AnswerService $answerService)
    {
        $this->answerService = $answerService;
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
        if (request()->answers) {
            foreach (request()->answers as $answer) {
                $answer['exercise_id'] = $exercise->id;
                $answers[] = $answer;
            }

            $this->answerService->create($answers);
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
        //
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
