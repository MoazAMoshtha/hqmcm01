<?php


namespace App\Http\Controllers;


class Mosque_adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('/mosque_admin');
    }
}
