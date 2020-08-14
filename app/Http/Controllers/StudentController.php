<?php

namespace App\Http\Controllers;

use App\Area;
use App\Area_Admin;
use App\Mosque_Admin;
use App\Student;
use App\User;
use App\Mosque;
use App\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('function.students_fun', ['students' => $students]);
    }

    public function show($id)
    {
        $students = DB::select('select * from students where id = ?', [$id]);
        return redirect()->route('function.students_fun', ['students' => $students])->with('status', 'editStudent');
    }

    public function insertform()
    {
        return view('function.students_fun');
    }

    public function insert(Request $request)
    {
        if (User::where('email', '=', $request->input('email'))->exists()) {
            return redirect('student/function.students_fun')->with('status', 'areaInsert Failure');
        } else {

        if (Student::all()->count() != 0) {
            $last_area_admin_hqmcm_id = Student::where('group', $request->input('group'))->orderBy('hqmcm_id', 'desc')->first()->hqmcm_id;
        } else {
            $last_area_admin_hqmcm_id = substr(  $request->input('group') , -2) . str_pad(0, 2, '0', STR_PAD_LEFT);
        }

            $group = Auth::user()->group;
            if (Student::all()->count() != 0){
                $last_student_hqmcm_id = Student::where('group', $group)->orderBy('hqmcm_id', 'ASC')->get()->last()->hqmcm_id;
            }else{
                $last_student_hqmcm_id = Auth::user()->group . str_pad(0, 2, '0', STR_PAD_LEFT);;
            }



        $hqmcm_id_student = $last_student_hqmcm_id + 1;
        $hqmcm_id_user = $hqmcm_id_student;
        $user_type = 'student';

        Student::create([
            'firstName' => $request->input('firstName') ,
            'secondName' => $request->input('secondName'),
            'familyName' => $request->input('familyName'),
            'id_number' => $request->input('id_number'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phoneNumber' => $request->input('phoneNumber'),
            'area' => Auth::user()->area,
            'mosque' => Auth::user()->mosque,
            'group' => Auth::user()->group,
            'hqmcm_id' => $hqmcm_id_student,
            ]);

        User::create([
            'firstName' => $request->input('firstName'),
            'secondName' => $request->input('secondName'),
            'familyName' => $request->input('familyName'),
            'id_number' => $request->input('id_number'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phoneNumber' => $request->input('phoneNumber'),
            'area' => Auth::user()->area,
            'mosque' => Auth::user()->mosque,
            'group' => Auth::user()->group,
            'hqmcm_id' => $hqmcm_id_student,
            'user_type' => 'student'
        ]);
            return redirect('student/function.students_fun')->with('status', 'areaInsert success');
        }


    }


    public function showStudents(Request $request)
    {
        $students = Student::where('group', Auth::user()->group)->get();
        return view('function.students_fun', ['students' => $students]);
    }

    public function SearchByArea()
    {
        $mosques = DB::select('select * from mosques');
        return view('function.students_fun', ['mosques' => $mosques]);
    }

    public function destroy($hqmcm_id)
    {
        Student::where('hqmcm_id',$hqmcm_id)->delete();
        User::find($hqmcm_id)->delete();
        return redirect('student/function.students_fun')->with('status', 'areaDeleted');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("mosques")->whereIn('id', explode(",", $ids))->delete();
        return view('function.students_fun');
    }

    public function edit(Request $request, $id)
    {
        $firstName = $request->input('firstName');
        $secondName = $request->input('secondName');
        $familyName = $request->input('familyName');
        $id_number = $request->input('id_number');
        $hqmcm_id = $request->input('hqmcm_id');

        $students = DB::table('students')->get();
        foreach ($students as $student) {
            if ($student->firstName == $firstName and $student->firstName != $request->input('firstName')) {
                return redirect('student/function.students_fun')->with('status', 'areaInsert Failure');
            } elseif ($student->hqmcm_id == $hqmcm_id and $student->hqmcm_id != $request->input('hqmcm_id')) {
                return redirect('student/function.students_fun')->with('status', 'hqmcm_id');
            }
        }
        Student::whereId($id)->update($request->except('_token'));
        return redirect('student/function.students_fun')->with('status', 'areaUpdate success');
    }
}
