<?php
/**
 * Exception handler
 */

namespace App\Exceptions;

use App\Libraries\Utility;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\App;

/**
 * Application Handler
 * @package App\Exceptions
 */
class Handler extends ExceptionHandler
{
    /** @var array A list of the exception types that should not be reported. */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception $exception Exception
     *
     * @return void
     */
    public function report( Exception $exception )
    {
        parent::report( $exception );
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request   HTTP request object
     * @param  \Exception               $exception Exception
     *
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response HTTP response
     */
    public function render( $request, Exception $exception )
    {
        if( $exception instanceof \Illuminate\Database\QueryException || $exception instanceof \Swift_TransportException ){

            if( $exception instanceof \Illuminate\Database\QueryException ){
                $errorMessage = $exception->getCode() === 1045 ? __( 'exception.database_connection' ) : __( 'exception.query' );
            } else if( $exception instanceof \Swift_TransportException ) {
                $errorMessage = __( 'exception.mail_server_connection' );
            } else {
                $errorMessage = $exception->getMessage();
            }

            if( $request->ajax() ){
                return response()->json( [ 'success' => false, 'message' => $errorMessage ], 500 );
            } else {
                $exception = new Exception( $errorMessage, 500 );

                return response()->view( 'errors.500', compact( 'exception' ), 500 );
            }
        }

        return parent::render( $request, $exception );
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request                 $request   HTTP request object
     * @param  \Illuminate\Auth\AuthenticationException $exception Authentication Exception
     *
     * @return \Illuminate\Http\RedirectResponse HTTP redirect response
     */
    protected function unauthenticated( $request, AuthenticationException $exception )
    {
        if( $request->expectsJson() ){
            return response()->json( [ 'error' => 'Unauthenticated.' ], 401 );
        }

        App::setLocale( Utility::getLanguageCode() );

        return redirect()->guest( route( 'login' ) );
    }
}
