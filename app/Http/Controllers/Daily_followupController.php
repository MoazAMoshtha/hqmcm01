<?php


namespace App\Http\Controllers;
use App\Daily;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class Daily_followupController extends Controller
{
    public static function  Last_recitations($hqmcm_id){
        if (Daily::where('attendance' , 'حاضر')->orderBy('student_hqmcm_id')){
            return DB::table('daily_record')->where('student_hqmcm_id', $hqmcm_id)->orderBy('updated_at','DESC')->value('daily_recitations');
        }
    }
    public static function  Last_attendance($hqmcm_id){
        $student_records = Daily::where('student_hqmcm_id' , $hqmcm_id)->orderBy('attendance' , 'asc')->get();
        foreach ($student_records as $student_record){
            if ($student_record->attendance == 'لم يسمع'){
                return $student_record->date;
            }elseif ($student_record->attendance == 'غائب'){
                return " ";
            }else{
                return $student_record->date;

            }
        }
    }
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


    public function save_record(Request $request)
    {
        if ($request->input('attendance') == 'لم يسمع'){
          $d = 'لم يسمع';
        }elseif ($request->input('s_quran') == null){
            $d = null;
        }else{
            $d = $request->input('to') . "<-" . $request->input('from') . $request->input('s_quran');

        }
        Daily::create([
            'student_hqmcm_id' => $request->input('hqmcm_id'),
            'attendance' =>  $request->input('attendance'),
            'date' =>  $request->input('date'),
            'daily_recitations' => $d,

        ]);
        return redirect()->route('daily_followup');
    }

}
