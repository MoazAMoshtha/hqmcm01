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

    public function get_mosque(Request $request){
        $area_mosques = Mosque::where('area' , $request->input('area'))->get();
        return ['area_mosques' => $area_mosques];

    }

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
            if (Mosque::where('area' , $request->input('area'))->count() == 0){
                $hqmcm_id = $request->input('area') . str_pad(1, 2, '0', STR_PAD_LEFT);
            }else{
                $hqmcm_id= 1 + Mosque::where('area' , $request->input('area'))->orderBy('hqmcm_id' , 'desc')->first()->hqmcm_id;
            }
            Mosque::create(['hqmcm_id' =>$hqmcm_id] + $request->all());
            if (Area::where('hqmcm_id' , $request->input('area'))->count() == 0){
                Area::where('hqmcm_id' , $request->input('area'))->update(['number_of_mosques'=> 1]);
            }else{
                $number_of_mosques = 1 + Area::where('hqmcm_id' , $request->input('area'))->first()->number_of_mosques;
                Area::where('hqmcm_id' , $request->input('area'))->update(['number_of_mosques' => $number_of_mosques]);
            }
            return redirect('mosque/function.mosque_fun')->with('status', 'areaInsert success');
        }
    }


    public function showMosques(Request $request)
    {
        if(Auth::user()->user_type == 'admin'){
            $mosques = Mosque::all();
        }else{
            $name = Auth::user()->area;
            $mosques = Mosque::where('area' , $name)->get();
        }
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
