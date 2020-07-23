<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class AreaController extends Controller {
    public function insertform() {
        return view('function.area_fun');
    }

    public function insert(Request $request) {
        $name = $request->input('name');
        $number_of_mosques = $request->input('number_of_mosques');
        $number_of_teachers = $request->input('number_of_teachers');
        $number_of_students = $request->input('number_of_students');
        $areas = DB::table('areas')->get();
        foreach ($areas as $area){
            if ($area->name == $name){
                return redirect('manger')->withErrors('message', 'fail');
            }
        }
        DB::select('insert into areas (name, number_of_mosques,number_of_teachers,number_of_students) values (?, ?, ?, ?)', [$name,$number_of_mosques,$number_of_teachers,$number_of_students]);
        return redirect('manger')->withSuccess('message', 'success');
    }

    public function showAreas() {
        $areas = DB::select('select * from areas');
        return view('manger',['areas'=>$areas])->withSuccess('message', 'success');
    }
}
