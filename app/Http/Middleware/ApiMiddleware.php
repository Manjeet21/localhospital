<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use Request;

class ApiMiddleware
{

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];



    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       if ($request instanceof \Dingo\Api\Http\Request)
        {
            $secret = Config::get('app.secret');
            $secretmatch = $request->header('secret');
            $apiurl = Config::get('app.apiurl');
            $baseurl = 'http://'.Request::server("HTTP_HOST");
            
            if ($apiurl == $baseurl)
            {
                if($secret == $secretmatch)
                {
                   return $next($request);
                }
                else
                {
                   return 'Invalid Credintials !';
                }
            }
        }

        return $next($request);
    }
}
