<?php

namespace App\Http\Controllers;

use App\Area_Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Input;

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
        if ($request->input('user_type') == 'area_admin'){
            if (Area_Admin::where('id', '=', $request->input('id'))->exists()) {
                return view('area_admins_page');
            }
        }else{
            return view('home');
        }

    }

}
