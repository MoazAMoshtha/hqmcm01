<?php


namespace App\Http\Controllers;


class StudentController
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
