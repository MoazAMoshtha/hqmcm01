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
        return view('manger', ['students' => $students]);
    }

    public function show($id)
    {
        $students = DB::select('select * from students where id = ?', [$id]);
        return redirect()->route('manger', ['students' => $students])->with('status', 'editStudent');
    }

    public function insertform()
    {
        return view('student/function.students_fun');
    }

    public function insert(Request $request)
    {
        if (User::where('email', '=', $request->input('email'))->exists()) {
            return redirect('manger')->with('status', 'areaInsert Failure');
        } else {

        $mosque = null;
        $group = null;
        $area = Area::where('hqmcm_id', $request->input('area'))->first();
        if (Area_Admin::all()->count() != 0) {
            $last_area_admin_hqmcm_id = Area_Admin::where('area', $area)->orderBy('hqmcm_id', 'ASC')->get()->last()->hqmcm_id;
        } else {
            $last_area_admin_hqmcm_id = $request->input('area') . str_pad(0, 2, '0', STR_PAD_LEFT);
        }

        if ($request->input('mosque') != 0) {
            $mosque = Mosque::where('hqmcm_id', $request->input('mosque'))->first()->name;
            if (Mosque_Admin::all()->count() != 0) {
                $last_mosque_admin_hqmcm_id = Mosque_Admin::where('mosque', $mosque)->orderBy('hqmcm_id', 'ASC')->get()->last()->hqmcm_id;
            } else {
                $last_mosque_admin_hqmcm_id = $request->input('mosque') . str_pad(0, 2, '0', STR_PAD_LEFT);;
            }
            if (Teacher::all()->count() != 0) {
                $last_teacher_hqmcm_id = Teacher::where('mosque', $mosque)->orderBy('hqmcm_id', 'ASC')->get()->last()->hqmcm_id;
            } else {
                $last_teacher_hqmcm_id = $request->input('mosque') . str_pad(1, 2, '0', STR_PAD_LEFT);
            }
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
            return redirect('manger')->with('status', 'areaInsert success');
        }


    }


    public function showStudents(Request $request)
    {
        $students = Student::where('group', Auth::user()->group)->get();
        return view('manger', ['students' => $students]);
    }

    public function SearchByArea()
    {
        $mosques = DB::select('select * from mosques');
        return view('manger', ['mosques' => $mosques]);
    }

    public function destroy($hqmcm_id)
    {
        Student::where('hqmcm_id',$hqmcm_id)->delete();
        User::find($hqmcm_id)->delete();
        return redirect('manger')->with('status', 'areaDeleted');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("mosques")->whereIn('id', explode(",", $ids))->delete();
        return view('manger');
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
                return redirect('manger')->with('status', 'areaInsert Failure');
            } elseif ($student->hqmcm_id == $hqmcm_id and $student->hqmcm_id != $request->input('hqmcm_id')) {
                return redirect('manger')->with('status', 'hqmcm_id');
            }
        }
        Student::whereId($id)->update($request->except('_token'));
        return redirect('manger')->with('status', 'areaUpdate success');
    }
}
