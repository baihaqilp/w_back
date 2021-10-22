<?php

namespace App\Exceptions;

use App\ApiCode;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder;
use Illuminate\Support\Arr;
use Illuminate\Auth\AuthenticationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            return $this->respondWithValidationError($exception);
        }

        return parent::render($request, $exception);
    }

    private function respondWithValidationError($exception) {
        return ResponseBuilder::asError(ApiCode::VALIDATION_ERROR)
            ->withData($exception->errors())
            ->withHttpCode(422)
            ->build();
    }

    protected function unauthenticated($request, \Illuminate\Auth\AuthenticationException $exception)
    {
      if($request->expectsJson()){
        return response()->json(['error' => 'Unauthenticated.'], 401);
      }
      $guard = $exception->guards();
      switch ($guard[0]) {
        case 'api':
            return response()->json([
                'success' => 0,
                'message' => "API tidak bisa diakses tanpa login"
            ]);
            break;
        case 'admin':
                return redirect('/admin/login');
                break;
         
        case 'investor':
            return redirect('/investor/login');
            break;  
        case 'finance':
            return redirect('/finance/login');
            break;  
        default:           
            return redirect('/');
            break;
    }
      
    }
}
