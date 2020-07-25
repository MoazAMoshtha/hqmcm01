<?php

namespace App\Http\Controllers;

use App\Area;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use phpDocumentor\Reflection\Element;

class MosqueController extends Controller
{
    public function index()
    {
        $areas = DB::select('select * from areas');
        return view('manger', ['areas' => $areas]);

    }

    public function show($id)
    {
        $areas = DB::select('select * from areas where id = ?', [$id]);
        return redirect()->route('manger', ['areas' => $areas])->with('status', 'edit');

    }

    public function insertform()
    {
        return view('area/function.area_fun');
    }

    public function insert(Request $request)
    {
        $test=new Area;
        $validator = Validator::make($request->all(),$test->rules);
        if ($validator->fails()) {
            return redirect('manger')->with('status', 'areaInsert Failure')->withErrors($validator);
        }
        Area::create($request->all());
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
        $hqmcm_id = $request->input('hqmcm_id');
        $number_of_mosques = $request->input('number_of_mosques');
        $number_of_teachers = $request->input('number_of_teachers');
        $number_of_students = $request->input('number_of_students');
        $areas = DB::table('areas')->get();
        foreach ($areas as $area) {
            if ($area->name == $name and $area->name != $request->input('name')) {
                return redirect('manger')->with('status', 'areaInsert Failure');
            }elseif($area->hqmcm_id == $hqmcm_id and $area->hqmcm_id != $request->input('hqmcm_id') ){
                return redirect('manger')->with('status', 'hqmcm_id');
            }
        }
        Area::whereId($id)->update($request->except('_token','secondName'));
        return redirect('manger')->with('status', 'areaUpdate success');
    }

}
