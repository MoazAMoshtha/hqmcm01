<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class AreaController extends Controller
{
    public function index()
    {
        $areas = DB::select('select * from areas');
        return view('manger', ['areas' => $areas]);

    }

    public function show($id)
    {
        $areas = DB::select('select * from areas where id = ?', [$id]);
        return redirect()->route('manger' , ['areas' => $areas] )->with('status','edit');

    }

    public function insertform()
    {
        return view('function.area_fun');
    }

    public function insert(Request $request)
    {
        $name = $request->input('name');
        $number_of_mosques = $request->input('number_of_mosques');
        $number_of_teachers = $request->input('number_of_teachers');
        $number_of_students = $request->input('number_of_students');
        $areas = DB::table('areas')->get();
        foreach ($areas as $area) {
            if ($area->name == $name) {
                return redirect('manger')->with('status', 'areaInsert Failure');
            }
        }
        DB::select('insert into areas (name, number_of_mosques,number_of_teachers,number_of_students) values (?,?, ?, ?)', [$name, $number_of_mosques, $number_of_teachers, $number_of_students]);
        return redirect('manger')->with('status', 'areaInsert success');
    }

    public function showAreas()
    {
        $areas = DB::select('select * from areas');
        return view('manger', ['areas' => $areas]);

    }

    public function destroy($id)
    {
        DB::delete('delete from areas where id = ?', [$id]);
        return redirect('manger')->with('status', 'areaDeleted');

    }

    public function edit(Request $request, $id)
    {
        $name = $request->input('name');
        $number_of_mosques = $request->input('number_of_mosques');
        $number_of_teachers = $request->input('number_of_teachers');
        $number_of_students = $request->input('number_of_students');
        DB::update('update areas set name = ?,number_of_mosques=?,number_of_teachers=?,number_of_students=? where id = ?', [$name, $number_of_mosques, $number_of_teachers, $number_of_students, $id]);
        return redirect('manger')->with('status', 'areaUpdate success');


    }

}
