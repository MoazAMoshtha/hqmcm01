<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\view;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;


class Controller extends BaseController
{

    public function __construct()
    {  /*$this->middleware('guest');
        $layout = 'app';
        View::share('layout', $layout);
*/

        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            if ( Auth::user()->user_type == 'admin' ){
                $layout = 'admin';
            }else{
                $layout = 'app';
            }
        View::share('layout', $layout);

            return $next($request);
        });


    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

}
