<?php

namespace App\Http\Controllers;

use App\Area;
use App\Mosque_Admin;
use App\User;
use App\Mosque;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class MosqueAdminController extends Controller
{

    public function index()
    {
        $mosque_admins = Mosque_Admin::all();
        return view('function.mosque_admins_fun', ['mosque_admins' => $mosque_admins]);
    }

    public function show($id)
    {
        $mosque_admins = DB::select('select * from mosque_admins where id = ?', [$id]);
        return redirect()->route('mosque_admin/function.mosque_admin_fun', ['mosque_admins' => $mosque_admins])->with('status', 'editMosque_Admin');
    }

    public function insertform()
    {
        return view('mosque_admin/function.mosque_admins_fun');
    }

    public function insert(Request $request)
    {

        $test = new Mosque_Admin;
        $validator = Validator::make($request->all(), $test->rules);
        if ($validator->fails()) {
            return redirect()->route('mosque_admin_fun')->with('status', 'areaInsert Failure')->withErrors($validator);
        }else{
            if(Mosque_Admin::all()->count() == 0){
                    $hqmcm_id = substr($request->input('mosque') , -2) . str_pad(1, 2, '0', STR_PAD_LEFT);
            }else{
                if(Mosque_Admin::where('mosque' ,$request->input('mosque') )->exists()){
                    $hqmcm_id = 1 + Mosque_Admin::where('mosque', $request->input('mosque'))->orderBy('hqmcm_id', 'ASC')->get()->last()->hqmcm_id;
                }
            }
        }

        if (User::where('email', '=', $request->input('email'))->exists()) {
            return redirect()->route('mosque_admin_fun')->with('status', 'areaInsert Failure')->withErrors($validator);
        } else {

            Mosque_Admin::create(['hqmcm_id' => $hqmcm_id] + $request->all());
            User::create(['user_type' => 'mosque_admin'] + ['hqmcm_id' => $hqmcm_id] + $request->all());
            return redirect()->route('mosque_admin_fun')->with('status', 'areaInsert success');
        }
    }


    public function showMosqueAdmins(Request $request)
    {
        if (Auth::user()->user_type == 'admin'){
            $mosque_admins = Mosque_Admin::all();
        }else{
            $mosque_admins = Mosque_Admin::where('area', Auth::user()->area)->get();
        }
        return view('function.mosque_admins_fun', ['mosque_admins' => $mosque_admins]);
    }

    public function SearchByArea()
    {
        $mosques = DB::select('select * from mosques');
        return view('function.mosque_admins_fun', ['mosques' => $mosques]);
    }

    public function destroy($id)
    {
        Mosque_Admin::find($id)->delete();
        return redirect('function.mosque_admins_fun')->with('status', 'areaDeleted');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("mosques")->whereIn('id', explode(",", $ids))->delete();
        return view('function.mosque_admins_fun');
        //return response()->json(['success' => "Products Deleted successfully."]);
    }

    public function edit(Request $request, $id)
    {
        $firstName = $request->input('firstName');
        $secondName = $request->input('secondName');
        $familyName = $request->input('familyName');
        $id_number = $request->input('id_number');
        $hqmcm_id = $request->input('hqmcm_id');

        $mosque_admins = DB::table('mosque_admins')->get();
        foreach ($mosque_admins as $mosque_admin) {
            if ($mosque_admin->firstName == $firstName and $mosque_admin->firstName != $request->input('firstName')) {
                return redirect('mosque_admin/function.mosque_admin_fun')->with('status', 'areaInsert Failure');
            } elseif ($mosque_admin->hqmcm_id == $hqmcm_id and $mosque_admin->hqmcm_id != $request->input('hqmcm_id')) {
                return redirect('mosque_admin/function.mosque_admin_fun')->with('status', 'hqmcm_id');
            }
        }
        Mosque_Admin::whereId($id)->update($request->except('_token'));
        return redirect('mosque_admin/function.mosque_admin_fun')->with('status', 'areaUpdate success');
    }
}
