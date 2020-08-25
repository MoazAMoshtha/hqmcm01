<?php

namespace App\Http\Controllers;

use App\Area;
use App\Mosque;
use App\Group;
use App\Teacher;
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
        return view('function.group_fun');
    }



    public function insert(Request $request)
    {
        if (Group::all()->count() == 0) {
            $hqmcm_id =$request->input('mosque') . str_pad(1, 2, '0', STR_PAD_LEFT);
        } else {
            if (Group::where('mosque' , $request->input('mosque'))->exists()){
                $hqmcm_id = Group::where('mosque', $request->input('mosque'))->orderby('hqmcm_id', 'desc')->first()->hqmcm_id + 1;

            }else{
                $hqmcm_id =$request->input('mosque') . str_pad(1, 2, '0', STR_PAD_LEFT);

            }
        }


        $test = new Group;
        $validator = Validator::make(['hqmcm_id'=>$hqmcm_id] + $request->all(), $test->rules);
        if ($validator->fails()) {
            return redirect('group/function.group_fun')->with('status', 'areaInsert Failure');
        } else {
            Group::create(['hqmcm_id'=> $hqmcm_id ] + $request->all());
            //Teacher::where('hqmcm_id' , $request->input('teacher'))->update(['group' , $hqmcm_id]);
            return redirect('group/function.group_fun')->with('status', 'areaInsert success');
        }
    }


    public function showGroups(Request $request)
    {
        if(Auth::user()->user_type ='admin'){
            $groups = Group::all();
        } elseif (Auth::user()->user_type = 'area_admin') {
            $groups = Group::where('area', Auth::user()->area)->get();
        } elseif(Auth::user()->user_type ='mosque_admin') {
            $groups = Group::where('mosque', Auth::user()->mosque)->get();
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
        return view('function.group_fun');
        //return response()->json(['success' => "Products Deleted successfully."]);
    }



    public function edit(Request $request)
    {

        Group::where('hqmcm_id', $request->input('hqmcm_id') )->update(['teacher' => $request->input('teacher')]);
        return redirect('group/function.group_fun')->with('status', 'areaUpdate success');
    }
}
