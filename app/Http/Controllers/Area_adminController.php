<?php


namespace App\Http\Controllers;


class Area_adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('/area_admin');
    }
}
