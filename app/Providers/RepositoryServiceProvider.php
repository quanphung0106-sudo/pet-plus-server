<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class
        );

        $this->app->bind(
            \App\Repositories\Audio\AudioRepositoryInterface::class,
            \App\Repositories\Audio\AudioRepository::class
        );

        $this->app->bind(
            \App\Repositories\DifficultyLevel\DifficultyLevelRepositoryInterface::class,
            \App\Repositories\DifficultyLevel\DifficultyLevelRepository::class
        );

        $this->app->bind(
            \App\Repositories\Enterprise\EnterpriseRepositoryInterface::class,
            \App\Repositories\Enterprise\EnterpriseRepository::class
        );

        $this->app->bind(
            \App\Repositories\Exercise\ExerciseRepositoryInterface::class,
            \App\Repositories\Exercise\ExerciseRepository::class
        );

        $this->app->bind(
            \App\Repositories\ExerciseDetailReport\ExerciseDetailReportRepositoryInterface::class,
            \App\Repositories\ExerciseDetailReport\ExerciseDetailReportRepository::class
        );

        $this->app->bind(
            \App\Repositories\ExerciseExerciseUnit\ExerciseExerciseUnitRepositoryInterface::class,
            \App\Repositories\ExerciseExerciseUnit\ExerciseExerciseUnitRepository::class
        );

        $this->app->bind(
            \App\Repositories\ExerciseFormat\ExerciseFormatRepositoryInterface::class,
            \App\Repositories\ExerciseFormat\ExerciseFormatRepository::class
        );

        $this->app->bind(
            \App\Repositories\ExercisePart\ExercisePartRepositoryInterface::class,
            \App\Repositories\ExercisePart\ExercisePartRepository::class
        );

        $this->app->bind(
            \App\Repositories\ExerciseReportReason\ExerciseReportReasonRepositoryInterface::class,
            \App\Repositories\ExerciseReportReason\ExerciseReportReasonRepository::class
        );

        $this->app->bind(
            \App\Repositories\ExerciseType\ExerciseTypeRepositoryInterface::class,
            \App\Repositories\ExerciseType\ExerciseTypeRepository::class
        );

        $this->app->bind(
            \App\Repositories\ExerciseUnit\ExerciseUnitRepositoryInterface::class,
            \App\Repositories\ExerciseUnit\ExerciseUnitRepository::class
        );

        $this->app->bind(
            \App\Repositories\Image\ImageRepositoryInterface::class,
            \App\Repositories\Image\ImageRepository::class
        );

        $this->app->bind(
            \App\Repositories\Level\LevelRepositoryInterface::class,
            \App\Repositories\Level\LevelRepository::class
        );

        $this->app->bind(
            \App\Repositories\PublicType\PublicTypeRepositoryInterface::class,
            \App\Repositories\PublicType\PublicTypeRepository::class
        );

        $this->app->bind(
            \App\Repositories\Status\StatusRepositoryInterface::class,
            \App\Repositories\Status\StatusRepository::class
        );

        $this->app->bind(
            \App\Repositories\Subject\SubjectRepositoryInterface::class,
            \App\Repositories\Subject\SubjectRepository::class
        );

        $this->app->bind(
            \App\Repositories\Video\VideoRepositoryInterface::class,
            \App\Repositories\Video\VideoRepository::class
        );

        $this->app->bind(
            \App\Repositories\Source\SourceRepositoryInterface::class,
            \App\Repositories\Source\SourceRepository::class
        );

        $this->app->bind(
            \App\Repositories\Answer\AnswerRepositoryInterface::class,
            \App\Repositories\Answer\AnswerRepository::class,
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
