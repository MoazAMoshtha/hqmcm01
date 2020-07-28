<?php

namespace App\Http\Controllers\Auth;

use App\Area_Admin;
use App\Mosque_Admin;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Student;
use App\Teacher;
use App\User;
use App\Http\Requests;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

            'firstName' => ['required', 'string', 'max:255'],
            'secondName' => ['required', 'string', 'max:255'],
            'familyName' => ['required', 'string', 'max:255'],
            'id_number' => ['integer'],
            'email' => ['unique:users','nullable','email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phoneNumber' => ['required', 'string', 'max:255'],
            'area' => ['required', 'string', 'max:255'],
            'mosque' => ['required', 'string', 'max:255'],
            'group' => [],
            'hqmcm_id' => [],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @param Requests $request
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user_type='user';
        if ($data['user_type'] == 'area_admin'){
            $user_type = 'area_admin';
            Area_Admin::create([
                'firstName' => $data['firstName'],
                'secondName' => $data['secondName'],
                'familyName' => $data['familyName'],
                'id_number' => $data['id_number'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phoneNumber' => $data['phoneNumber'],
                'area' => $data['area'],
                'mosque' => $data['mosque'],
                'group' => $data['group'],
                'hqmcm_id' => $data['hqmcm_id'],
            ]) ;
        }elseif($data['user_type'] == 'mosque_admin'){
            $user_type = 'mosque_admin';
            Mosque_Admin::create([
                'firstName' => $data['firstName'],
                'secondName' => $data['secondName'],
                'familyName' => $data['familyName'],
                'id_number' => $data['id_number'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phoneNumber' => $data['phoneNumber'],
                'area' => $data['area'],
                'mosque' => $data['mosque'],
                'group' => $data['group'],
                'hqmcm_id' => $data['hqmcm_id'],
            ]) ;
        }elseif($data['user_type'] == 'teacher'){
            $user_type = 'teacher';
            Teacher::create([
                'firstName' => $data['firstName'],
                'secondName' => $data['secondName'],
                'familyName' => $data['familyName'],
                'id_number' => $data['id_number'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phoneNumber' => $data['phoneNumber'],
                'area' => $data['area'],
                'mosque' => $data['mosque'],
                'group' => $data['group'],
                'hqmcm_id' => $data['hqmcm_id'],
            ]) ;
        }elseif($data['user_type'] == 'student'){
            $user_type = 'student';
            Student::create([
                'firstName' => $data['firstName'],
                'secondName' => $data['secondName'],
                'familyName' => $data['familyName'],
                'id_number' => $data['id_number'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phoneNumber' => $data['phoneNumber'],
                'area' => $data['area'],
                'mosque' => $data['mosque'],
                'group' => $data['group'],
                'hqmcm_id' => $data['hqmcm_id'],
            ]) ;
        }
        return User::create([
            'firstName' => $data['firstName'],
            'secondName' => $data['secondName'],
            'familyName' => $data['familyName'],
            'id_number' => $data['id_number'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phoneNumber' => $data['phoneNumber'],
            'area' => $data['area'],
            'mosque' => $data['mosque'],
            'group' => $data['group'],
            'hqmcm_id' => $data['hqmcm_id'],
            'user_type' => $user_type
        ]);


    }
}
