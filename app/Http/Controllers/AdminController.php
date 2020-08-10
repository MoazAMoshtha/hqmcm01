<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\view;

class AdminController extends Controller
{
    public function __construct()
    {
        $admin = Admin::all();
        View::share('admin', $admin);
    }

    public function index()
    {
        return view('admin');
    }

    public function admin_login_page()
    {
        return view('admin.admin_login');
    }
    public function admin_dashboard()
    {
        return view('admin.admin_dashboard');
    }

    public function admin_login(Request $request)
    {
    $email = $request->input('email');
    $password = $request->input('password');
    $passwordCheck = Admin::where('email' , $email)->first()->password;
        if ($password == $passwordCheck){


            return  redirect(route('admin.dashboard'));
        }else{
            return view('admin.admin_login');
        }
    }
}
