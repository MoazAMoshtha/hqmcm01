<?php

namespace App\Http\Controllers;

use App\Area;
use App\Mosque;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MosqueController extends Controller
{


    public function index()
    {
        $mosques = Mosque::all();
        return view('function.mosque_fun', ['mosques' => $mosques] );
    }

    public function show($id)
    {
        $mosques = DB::select('select * from mosques where id = ?', [$id]);
        return redirect()->route('mosque_fun', ['mosques' => $mosques])->with('status', 'editMosque');

    }

    public function insertform()
    {
        return view('mosque/function.mosque_fun');
    }

    public function insert(Request $request)
    {
        $test = new Mosque;
        $validator = Validator::make($request->all(), $test->rules);
        if ($validator->fails()) {
            return redirect('mosque/function.mosque_fun')->with('status', 'areaInsert Failure');
        }else {
            Mosque::create($request->all());
            return redirect('mosque/function.mosque_fun')->with('status', 'areaInsert success');
        }
    }


    public function showMosques(Request $request)
    {
        $name = Auth::user()->area;
        $mosques = Mosque::where('area' , $name)->get();
        return view('function.mosque_fun', ['mosques' => $mosques]);
    }

    public function SearchByArea()
    {
        $mosques = DB::select('select * from mosques');
        return view('function.mosque_fun', ['mosques' => $mosques]);
    }

    public function destroy($id)
    {
        Mosque::find($id)->delete();
        return redirect('mosque/function.mosque_fun')->with('status', 'areaDeleted');
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
                return redirect('mosque/function.mosque_fun')->with('status', 'areaInsert Failure');
            } elseif ($mosque->hqmcm_id == $hqmcm_id and $mosque->hqmcm_id != $request->input('hqmcm_id')) {
                return redirect('mosque/function.mosque_fun')->with('status', 'hqmcm_id');
            }
        }
        Mosque::where('hqmcm_id' , $hqmcm_id)->update($request->except('_token'));
        return redirect('mosque/function.mosque_fun')->with('status', 'areaUpdate success');
    }
}
