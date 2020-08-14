<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Area;
use App\Daily;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\View;

class AreaController extends Controller
{

    public function index()
    {
        $areas = Area::all();
        return view('function.area_fun', ['areas' => $areas]);

    }

    public function show($id)
    {
        $areas = DB::select('select * from areas where id = ?', [$id]);
        return redirect()->route('area_fun', ['areas' => $areas])->with('status', 'editArea');

    }

    public function insertform()
    {
        return view('function.area_fun');
    }

    public function insert(Request $request)
    {
        $test=new Area;
        $validator = Validator::make($request->all(),$test->rules);
        if ($validator->fails()) {
            return redirect('area/function.area_fun')->with('status', 'areaInsert Failure')->withErrors($validator);
    }
        Area::create($request->all());
        return redirect('area/function.area_fun')->with('status', 'areaInsert success');


    }


    public function showAreas()
    {
        $areas = DB::select('select * from areas');
        return view('function.area_fun', ['areas' => $areas]);

    }

    public function destroy($id)
    {
        DB::delete('delete from areas where id = ?', [$id]);
        return redirect('area/function.area_fun')->with('status', 'areaDeleted');

    }

    public function edit(Request $request, $id)
    {
        $name = $request->input('name');
        $hqmcm_id = $request->input('hqmcm_id');
        $number_of_mosques = $request->input('number_of_mosques');
        $number_of_teachers = $request->input('number_of_teachers');
        $number_of_students = $request->input('number_of_students');
        $areas = DB::table('areas')->get();
        foreach ($areas as $area) {
                if ($area->name == $name and $area->name != $request->input('name')) {
                    return redirect('area/function.area_fun')->with('status', 'areaInsert Failure');
                }elseif($area->hqmcm_id == $hqmcm_id and $area->hqmcm_id != $request->input('hqmcm_id') ){
                    return redirect('area/function.area_fun')->with('status', 'hqmcm_id');
                }
        }
        Area::whereId($id)->update($request->except('_token','secondName'));
       return redirect('area/function.area_fun')->with('status', 'areaUpdate success');
    }

}
