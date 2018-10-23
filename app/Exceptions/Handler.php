<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Request;
class Handler extends ExceptionHandler
{
  private function apiResponse($status,$message,$data = null){

  $response=[
      'status' =>$status,
      'message' =>$message,
      'data' =>$data,

  ];
  return response()->json($response);
}
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
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)

{

return $request->expectsJson()

//? responseJson(0,'Unauthenticated.')
? $this->apiResponse(0,'Unauthenticated.')

: redirect()->guest($exception->redirectTo() ?? route('login'));

}



}
