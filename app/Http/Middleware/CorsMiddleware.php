<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       //Intercepts OPTIONS requests
    if ($request->isMethod('OPTIONS')) {
        $response = response('', 200);
    } else {
        // Pass the request to the next middleware
	
        $response = $next($request);
    }

    // Adds headers to the response
    $response->header('Access-Control-Allow-Methods', 'HEAD, GET, POST, PUT, PATCH, DELETE');
    $response->header('Access-Control-Allow-Headers', $request->header('Access-Control-Request-Headers'));
    $response->header('Access-Control-Allow-Origin', '*');
    $response->header('Access-Control-Expose-Headers', 'Location');
    $response->header('Content-Type', 'application/json');


    // Sends it
   // return response()->json($response, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
   //     JSON_UNESCAPED_UNICODE);  
	return $response;
 }
}
