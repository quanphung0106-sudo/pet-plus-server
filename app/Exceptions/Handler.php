<?php

namespace App\Exceptions;

use App\Enums\ErrorType;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Exception|Throwable $e)
    {
//        dd($e);
        // API response
        if ($request->is('api/*')) {
            if ($e instanceof AuthenticationException) {
                return $this->toResponse($request, ErrorType::CODE_4010, __('errors.MSG_4010'), ErrorType::STATUS_4010);
            }

            if ($e instanceof Responsable) {
                return $e->toResponse($request);
            }

            // validation exception
            if ($e instanceof ValidationException) {
                $response = [
                    'error' => [
                        'code' => (int)ErrorType::CODE_4220,
                        'message' => $e->errors()
                    ]
                ];
                return response()->json($response, ErrorType::STATUS_4220);
            }

            if ($e instanceof ThrottleRequestsException) {
                $response = [
                    'error' => [
                        'code' => (int)ErrorType::CODE_4000,
                        'message' => __('errors.MSG_THROTTLE')
                    ]
                ];
                return response()->json($response, ErrorType::STATUS_4000);
            }

            // HTTP Exception
            if ($this->isHttpException($e)) {
                if ($e->getStatusCode() == ErrorType::STATUS_4000) {
                    return $this->toResponse($request, ErrorType::CODE_4000, __('errors.MSG_4000'), $e->getStatusCode());
                }

                if ($e->getStatusCode() == ErrorType::STATUS_4050) {
                    return $this->toResponse($request, ErrorType::CODE_4050, __('errors.MSG_4050'), $e->getStatusCode());
                }
            }

            return $this->toResponse($request, ErrorType::CODE_5001, __('errors.MSG_5001'), ErrorType::STATUS_5001);
        }

        if (!($e instanceof ValidationException)) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(
                    $this->getJsonMessage($e),
                    $this->getExceptionHTTPStatusCode($e)
                );
            }
        }

        return parent::render($request, $e);
    }

    protected function toResponse($request, string $code, string $message, int $status)
    {
        return (new BaseException($code, $message, $status))->toResponse($request);
    }

    protected function getJsonMessage($e)
    {
        // You may add in the code, but it's duplication
        return [
            'status' => 'error',
            'message' => $e->getMessage(),
        ];
    }

    protected function getExceptionHTTPStatusCode($e)
    {
        // Not all Exceptions have a http status code
        // We will give Error 500 if none found
        return method_exists($e, 'getStatusCode') ?
            $e->getStatusCode() : 500;
    }

    /**
     * Convert a validation exception into a JSON response.
     *
     * @param \Illuminate\Http\Request                   $request
     * @param \Illuminate\Validation\ValidationException $exception
     * @return \Illuminate\Http\JsonResponse
     */
    protected function invalidJson($request, ValidationException $exception)
    {
        $error = 'Validation Error';
        $response = [
            'status' => 'fail',
            'message' => $error,
        ];

        foreach ($exception->errors() as $key => $errors) {
            if (is_array($errors) && count($errors)) {
                foreach ($errors as $error) {
                    $response['data']['errors'][] = [
                        'key' => $key,
                        'error' => $error,
                    ];
                }
            } else {
                $response['data']['errors'] = [];
            }
        }

        return response()->json($response, $exception->status);
    }
}
