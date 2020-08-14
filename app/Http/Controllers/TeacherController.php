<?php

namespace App\Http\Controllers;

use App\Area;
use App\User;
use App\Mosque;
use App\Teacher;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('function.teachers_fun', ['teachers' => $teachers]);
    }

    public function show($id)
    {
        $teachers = DB::select('select * from teachers where id = ?', [$id]);
        return redirect()->route('manger', ['teachers' => $teachers])->with('status', 'editTeacher');
    }

    public function insertform()
    {
        return view('teacher/function.teachers_fun');
    }

    public function insert(Request $request)
    {
        $areas = Area::where('id', $request->input('area'))->get();
        foreach ($areas as $area) {
            $areaName = $area->name;
        }

        $test = new Teacher;
        $validator = Validator::make($request->all(), $test->rules);
        if ($validator->fails()) {
            return redirect('manger')->with('status', 'areaInsert Failure')->withErrors($validator);
        }
        $name = $request->input('name');
        $mosques = Mosque::where('hqmcm_id', $request->input('mosque'))->get();
        foreach ($mosques as $mosque) {
            $mosqueName = $mosque->name;
        }
        $teachers = Teacher::where('mosque', $mosqueName)->get();
        if ($teachers->all() == null) {
            $teacher_id = 1;
        } else {
            foreach ($teachers as $teacher) {

                $teacher_id = $teacher->id + 1;

            }
        }

        $hqmcm_id = str_pad($request->input('area'), 2, '0', STR_PAD_LEFT) . str_pad($request->input('mosque'), 2, '0', STR_PAD_LEFT) . str_pad($teacher_id, 2, '0', STR_PAD_LEFT);

        if (User::where('email', '=', $request->input('email'))->exists()) {
            return redirect('manger')->with('status', 'areaInsert Failure')->withErrors($validator);
        } else {

            Teacher::create(['hqmcm_id' => $hqmcm_id, 'mosque' => $mosqueName, 'area' => $areaName] + $request->all());
            User::create(['hqmcm_id' => $hqmcm_id, 'mosque' => $mosqueName, 'user_type' => 'teacher', 'area' => $areaName] + $request->all());
            return redirect('manger')->with('status', 'areaInsert success');
        }
    }


    public function showTeachers(Request $request)
    {
        $name = Auth::user()->area;
        $teachers = Teacher::where('area', $name)->get();
        return view('manger', ['teachers' => $teachers]);
    }

    public function SearchByArea()
    {
        $mosques = DB::select('select * from mosques');
        return view('manger', ['mosques' => $mosques]);
    }

    public function destroy($id)
    {
        Teacher::find($id)->delete();
        return redirect('manger')->with('status', 'areaDeleted');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("mosques")->whereIn('id', explode(",", $ids))->delete();
        return view('manger');
        //return response()->json(['success' => "Products Deleted successfully."]);
    }

    public function edit(Request $request, $id)
    {
        $firstName = $request->input('firstName');
        $secondName = $request->input('secondName');
        $familyName = $request->input('familyName');
        $id_number = $request->input('id_number');
        $hqmcm_id = $request->input('hqmcm_id');

        $teachers = DB::table('teachers')->get();
        foreach ($teachers as $teacher) {
            if ($teacher->firstName == $firstName and $teacher->firstName != $request->input('firstName')) {
                return redirect('manger')->with('status', 'areaInsert Failure');
            } elseif ($teacher->hqmcm_id == $hqmcm_id and $teacher->hqmcm_id != $request->input('hqmcm_id')) {
                return redirect('manger')->with('status', 'hqmcm_id');
            }
        }
        Teacher::whereId($id)->update($request->except('_token'));
        return redirect('manger')->with('status', 'areaUpdate success');
    }
}
