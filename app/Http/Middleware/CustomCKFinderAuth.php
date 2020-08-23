<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CustomCKFinderAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // dd(Auth::user());;
        $config = [];
        if(Auth::check()){
            $config['ckfinder.authentication'] = function() {
                return true;
            };
        }else{
            
            $config['ckfinder.authentication'] = function() {
                return false;
            };
        }
        $config['ckfinder.backends.default.baseUrl'] = config('app.url').'/public/uploads/';
        $config['ckfinder.backends.default.root'] = public_path('/uploads/');

        $config['ckfinder.licenseName'] = 'localhost';
        $config['ckfinder.licenseKey'] = 'V7J77DWBM144NNYYRWHQ4WMJTRQL7';
        $config['ckfinder.csrfProtection'] = false;
        
        config($config);
        //dd( config('ckfinder'));
        return $next($request);
    }
}
