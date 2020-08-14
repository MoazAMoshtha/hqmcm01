<?php

namespace App\Http\Controllers\Auth;

use App\Area;
use App\Area_Admin;
use App\Admin;
use App\Group;
use App\Mosque;
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
use Illuminate\Validation\Rules\Exists;


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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => ['required', 'string', 'max:255'],
            'secondName' => ['required', 'string', 'max:255'],
            'familyName' => ['required', 'string', 'max:255'],
            'id_number' => ['integer'],
            'email' => ['unique:users', 'nullable', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phoneNumber' => ['required', 'string', 'max:255'],
            'area' => ['required', 'max:255'],
            'mosque' => [ 'nullable', 'max:255'],
            'group' => ['nullable'],
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
        $mosque = 0;
        $group = 0;
        if ($data['user_type'] == 'admin'){
            $area=$data['arae'] = 0;
            $mosque = $data['mosque']=  0;
            $group = $data['group'] =  0;
        }else {

            if (Area_Admin::all()->count() != 0) {
                $last_area_admin_hqmcm_id = Area_Admin::where('area', $data['area'])->orderBy('hqmcm_id', 'ASC')->get()->last()->hqmcm_id;
            } else {
                $last_area_admin_hqmcm_id = $data['area'] . str_pad(0, 2, '0', STR_PAD_LEFT);
            }

            if ($data['mosque'] != 0) {
                $mosque = $data['mosque'];
                if (Mosque_Admin::all()->count() != 0) {
                    $last_mosque_admin_hqmcm_id = Mosque_Admin::where('mosque', $mosque)->orderBy('hqmcm_id', 'ASC')->get()->last()->hqmcm_id;
                } else {
                    $last_mosque_admin_hqmcm_id = substr($data['mosque'], -2) . str_pad(0, 2, '0', STR_PAD_LEFT);;
                }
                if (Teacher::all()->count() != 0) {
                    $last_teacher_hqmcm_id = Teacher::where('mosque', $mosque)->orderBy('hqmcm_id', 'ASC')->get()->last()->hqmcm_id;
                } else {
                    $last_teacher_hqmcm_id = substr($data['mosque'], -2) . str_pad(1, 2, '0', STR_PAD_LEFT);
                }
            }
            if ($data['group'] != 0) {
                $group = $data['group'];
                if (Student::all()->count() != 0) {
                    $last_student_hqmcm_id = Student::where('group', $group)->orderBy('hqmcm_id', 'desc')->first();
                } else {
                    $last_student_hqmcm_id = substr($data['group'], -2) . str_pad(0, 2, '0', STR_PAD_LEFT);;
                }
            }
            $user_type = 'user';

        }
        if ($data['user_type'] == 'area_admin') {
            $hqmcm_id_area_admin = $last_area_admin_hqmcm_id + 1;
            $user_type = 'area_admin';
            $hqmcm_id_user = $hqmcm_id_area_admin;
            Area_Admin::create([
                'firstName' => $data['firstName'],
                'secondName' => $data['secondName'],
                'familyName' => $data['familyName'],
                'id_number' => $data['id_number'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phoneNumber' => $data['phoneNumber'],
                'area' => $data['area'],
                'hqmcm_id' => $hqmcm_id_area_admin,
            ]);


        } elseif ($data['user_type'] == 'mosque_admin') {
            $hqmcm_id_mosque_admin = $last_mosque_admin_hqmcm_id + 1;
            $hqmcm_id_user = $hqmcm_id_mosque_admin;
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
                'hqmcm_id' => $hqmcm_id_mosque_admin,
            ]);


        } elseif ($data['user_type'] == 'teacher') {
            $hqmcm_id_teacher = $last_teacher_hqmcm_id + 1;
            $hqmcm_id_user = $hqmcm_id_teacher;
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
                'group' => $group,
                'hqmcm_id' => $hqmcm_id_teacher,
            ]);



        } elseif ($data['user_type'] == 'student') {
            $hqmcm_id_student = $last_student_hqmcm_id + 1;
            $hqmcm_id_user = $hqmcm_id_student;
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
                'group' => $group,
                'hqmcm_id' => $hqmcm_id_student,
            ]);
            $student_count = Student::where('group',$group)->count() ;
            Group::where('hqmcm_id',$group)->update(['number_of_students' => $student_count]);
        }

        elseif ($data['user_type'] == 'admin') {
            $hqmcm_id_user = 1;
            $user_type = 'admin';
            Admin::create([
                'firstName' => $data['firstName'],
                'secondName' => $data['secondName'],
                'familyName' => $data['familyName'],
                'id_number' => $data['id_number'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phoneNumber' => $data['phoneNumber'],
                'hqmcm_id' => 1,
            ]);
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
            'mosque' => $mosque,
            'group' => $group,
            'hqmcm_id' => $hqmcm_id_user,
            'user_type' => $user_type
        ]);
    }
}
