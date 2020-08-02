<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Redirect;


class Daily_followupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('daily_followup');
    }
    public function daily_record($hqmcm_id)
    {
        return redirect()->route('daily_followup', ['hqmcm_id' => $hqmcm_id]);
    }

}
