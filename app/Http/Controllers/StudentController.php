<?php


namespace App\Http\Controllers;


class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('/student');
    }
}
