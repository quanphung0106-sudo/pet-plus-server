<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\DBConstant;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BaseService
{
    public function __construct()
    {
        //
    }

    /**
     * Write debug log.
     *
     * @param string      $message
     * @param null|string $code
     */
    protected function logDebug($message, $code = null): void
    {
        // Log context
        $context = $this->getContext($code);

        Log::debug($message, $context);
    }

    /**
     * Write info log.
     *
     * @param string      $message
     * @param null|string $code
     */
    protected function logInfo($message, $code = null): void
    {
        // Log context
        $context = $this->getContext($code);

        Log::info($message, $context);
    }

    /**
     * Write warning log.
     *
     * @param string      $message
     * @param null|string $code
     */
    protected function logWarning($message, $code = null): void
    {
        // Log context
        $context = $this->getContext($code);

        Log::warning($message, $context);
    }

    /**
     * Get guard
     *
     * @param $guardName
     * @return void
     */
    protected function getGuard($guard = 'user')
    {
        return Auth::guard($guard);
    }

    public function getYear($date)
    {
        return !empty($date) ? (int)Carbon::parse($date)->diff(now())->format('%y') : null;
    }
}
