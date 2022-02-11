<?php

namespace App\Http\Middleware;

use App\Models\ApiKeys;
use Closure;
use Exception;
use Illuminate\Http\Request;

class ApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(! $request->header('X-Auth')){
            return response()->json(['error' => 'Application must use OAuth'] , 403);
        }
        try{
            $apiKey = ApiKeys::all()->where('api_key' , '=' , $request->header('X-Auth') )->first();
            if($apiKey == [])
                return response()->json(['error' => 'Wrong ApiKey'] , 403);
            else{
                return $next($request);
            }
        }catch(Exception $e){
            return response()->json(['error' => 'An error was occured'] , 500);
        }


        // return $next($request);
    }
}
