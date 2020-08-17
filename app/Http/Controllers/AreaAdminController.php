<?php

namespace App\Http\Controllers;

use App\Area;
use App\Area_Admin;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AreaAdminController extends Controller
{
    public function index()
    {
        $area_admins = Area_Admin::all();
        return view('function.area_admins_fun', ['area_admins' => $area_admins]);
    }

    public function show($id)
    {
        $area_admins = DB::select('select * from area_admins where id = ?', [$id]);
        return redirect()->route('area_admin_fun', ['area_admins' => $area_admins])->with('status', 'editAreaAdmin');
    }

    public function insertform()
    {
        return view('area_admin/function.area_admins_fun');
    }

    public function insert(Request $request)
    {

        $test = new Area_Admin;
        $validator = Validator::make($request->all(), $test->rules);
        if ($validator->fails()) {
            return redirect('area_admin/function.area_admin_fun')->with('status', 'areaInsert Failure')->withErrors($validator);
        }else{
            if(Area_Admin::all()->count() == 0){
                $hqmcm_id = $request->input('area') . str_pad(1, 2, '0', STR_PAD_LEFT);
            }else{
                $hqmcm_id = 1 + Area_Admin::where('area', $request->input('area'))->orderBy('hqmcm_id', 'ASC')->get()->last()->hqmcm_id;
               // if(Area_Admin::where('area' ,$request->input('area'))->exists()){
                    //return redirect('area_admin/function.area_admin_fun')->with('status', 'areaInsert Failure');
              //  }
            }
        }


        if (User::where('email', '=', $request->input('email'))->exists()) {
            return redirect('area_admin/function.area_admin_fun')->with('status', 'areaInsert Failure')->withErrors($validator);
        } else {

            Area_Admin::create(['hqmcm_id'=> $hqmcm_id] + $request->all());
            User::create(['user_type' => 'area_admin'] + ['hqmcm_id'=> $hqmcm_id] +  $request->all());
            return redirect('area_admin/function.area_admin_fun')->with('status', 'areaInsert success');
        }
    }


    public function showAreaAdmins(Request $request)
    {
        $area_admins = Area_Admin::where('area', Auth::user()->area)->get();
        return view('function.area_admins_fun', ['area_admins' => $area_admins]);
    }

    public function SearchByArea()
    {
        $areas = DB::select('select * from areas');
        return view('function.area_admins_fun', ['areas' => $areas]);
    }

    public function destroy($id)
    {
        Area_Admin::find($id)->delete();
        return redirect('function.area_admins_fun')->with('status', 'areaDeleted');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("areas")->whereIn('id', explode(",", $ids))->delete();
        return view('function.area_admins_fun');
        //return response()->json(['success' => "Products Deleted successfully."]);
    }

    public function edit(Request $request, $id)
    {
        $firstName = $request->input('firstName');
        $secondName = $request->input('secondName');
        $familyName = $request->input('familyName');
        $id_number = $request->input('id_number');
        $hqmcm_id = $request->input('hqmcm_id');

        $area_admins = DB::table('area_admins')->get();
        foreach ($area_admins as $area_admin) {
            if ($area_admin->firstName == $firstName and $area_admin->firstName != $request->input('firstName')) {
                return redirect('area_admin/function.area_admin_fun')->with('status', 'areaInsert Failure');
            } elseif ($area_admin->hqmcm_id == $hqmcm_id and $area_admin->hqmcm_id != $request->input('hqmcm_id')) {
                return redirect('area_admin/function.area_admin_fun')->with('status', 'hqmcm_id');
            }
        }
        Area_Admin::whereId($id)->update($request->except('_token'));
        return redirect('area_admin/function.area_admin_fun')->with('status', 'areaUpdate success');
    }
}
