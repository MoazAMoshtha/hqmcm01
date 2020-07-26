<?php

namespace App\Http\Controllers;

use App\Mosque;
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
        $mosques = Mosque::all();
        return view('manger', ['mosques' => $mosques]);

    }

    public function show($id)
    {
        //$mosques = Mosque::find($id);
        //$mosques = Mosque::all()->where('id',$id);
        $mosques = DB::select('select * from mosques where id = ?', [$id]);
        return redirect()->route('manger', ['mosques' => $mosques])->with('status', 'editMosque');

    }

    public function insertform()
    {
        return view('mosque/function.mosque_fun');
    }

    public function insert(Request $request)
    {
        $test=new Mosque;
        $validator = Validator::make($request->all(),$test->rules);
        if ($validator->fails()) {
            return redirect('manger')->with('status', 'areaInsert Failure')->withErrors($validator);
        }
        Mosque::create($request->all());
        return redirect('manger')->with('status', 'areaInsert success');


    }


    public function showMosques()
    {
        $mosques = DB::select('select * from mosques');
        return view('manger', ['mosques' => $mosques]);

    }

    public function destroy($id)
    {
        Mosque::find($id)->delete();
        //Mosque::destroy('id',$id);
        //DB::delete('delete from areas where id = ?', [$id]);
        return redirect('manger')->with('status', 'areaDeleted');

    }

    public function edit(Request $request, $id)
    {
        $name = $request->input('name');
        $area = $request->input('area');
        $hqmcm_id = $request->input('hqmcm_id');
        $mosque_admin = $request->input('mosque_admin');
        $number_of_teachers = $request->input('number_of_teachers');
        $number_of_students = $request->input('number_of_students');
        $mosques = DB::table('mosques')->get();
        foreach ($mosques as $mosque) {
            if ($mosque->name == $name and $mosque->name != $request->input('name')) {
                return redirect('manger')->with('status', 'areaInsert Failure');
            }elseif($mosque->hqmcm_id == $hqmcm_id and $mosque->hqmcm_id != $request->input('hqmcm_id') ){
                return redirect('manger')->with('status', 'hqmcm_id');
            }
        }
        Mosque::whereId($id)->update($request->except('_token','secondName'));
        return redirect('manger')->with('status', 'areaUpdate success');
    }

}
