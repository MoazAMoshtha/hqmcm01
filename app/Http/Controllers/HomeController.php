<?php

namespace App\Http\Controllers;

use App\Area_Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Input;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * @param array $data
     */


   public function index(Request $request)
    {
            if (Auth::user()->user_type == 'admin'){
                    return redirect(route('admin.dashboard'));
            }else{
                return view('home');
            }
    }

}
