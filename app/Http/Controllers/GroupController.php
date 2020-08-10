<?php

namespace App\Http\Controllers;

use App\Area;
use App\Mosque;
use App\Group;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{

    public function index()
    {
        return view('function.group_fun', ['groups' => Group::all()]);
    }



    public function show($id)
    {

        $groups = Group::where('id', $id)->get();
        return redirect()->route('group_fun', ['groups' => $groups])->with('status', 'editGroup');

    }



    public function insertform()
    {
        return view('group/function.group_fun');
    }



    public function insert(Request $request)
    {
        $test = new Group;
        $validator = Validator::make($request->all(), $test->rules);
        if ($validator->fails()) {
            return redirect('group/function.group_fun')->with('status', 'areaInsert Failure');
        } else {
            Group::create($request->all());
            return redirect('group/function.group_fun')->with('status', 'areaInsert success');
        }
    }


    public function showGroups(Request $request)
    {
        if (Auth::user()->user_type) {
            $name = Auth::user()->area;
            $groups = Group::where('area', $name)->get();
        } else {
            $name = Auth::user()->mosque;
            $groups = Group::where('mosque', $name)->get();
        }
        return view('function.group_fun', ['groups' => $groups]);
    }



    public function SearchByArea()
    {
        $mosques = DB::select('select * from mosques');
        return view('function.group_fun', ['mosques' => $mosques]);
    }



    public function destroy($id)
    {
        Group::find($id)->delete();
        return redirect('group/function.group_fun')->with('status', 'areaDeleted');
    }



    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("mosques")->whereIn('id', explode(",", $ids))->delete();
        return view('function.mosque_fun');
        //return response()->json(['success' => "Products Deleted successfully."]);
    }



    public function edit(Request $request)
    {
        $name = $request->input('name');
        $area = $request->input('area');
        $hqmcm_id = $request->input('hqmcm_id');
        $mosque_admin = $request->input('mosque_admin');
        $number_of_teachers = $request->input('number_of_teachers');
        $number_of_students = $request->input('number_of_students');
        $mosques = Mosque::all();
        //$mosques = DB::table('mosques')->get();
        foreach ($mosques as $mosque) {
            if ($mosque->name == $name and $mosque->name != $request->input('name')) {
                return redirect('group/function.group_fun')->with('status', 'areaInsert Failure');
            } elseif ($mosque->hqmcm_id == $hqmcm_id and $mosque->hqmcm_id != $request->input('hqmcm_id')) {
                return redirect('group/function.group_fun')->with('status', 'hqmcm_id');
            }
        }
        Mosque::where('hqmcm_id', $hqmcm_id)->update($request->except('_token'));
        return redirect('group/function.group_fun')->with('status', 'areaUpdate success');
    }
}
