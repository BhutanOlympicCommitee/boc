<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Athlete_bioinformation;
use App\Athlete_address;
use App\Associated_Sport;
use App\TrainingSchedule;
use App\AthleteTrainingSchedule;
use App\AtheleteTrainingAttendance;
use Session;
use Auth;
class TrainingInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $athlete_info=Athlete_bioinformation::all();
        return view('sport_organization_user.training_information.index',compact('athlete_info'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $training_info=TrainingSchedule::all();
        return view('sport_organization_user.training_information.create',compact('training_info'));
    }
    
    public function trainingAttendanceIndex()
    {
        $training_schedule=TrainingSchedule::all();
        return view('sport_organization_user.training_information.attendance',compact('training_schedule'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $training_schedule=new TrainingSchedule;
        $training_schedule->day_id=$request->day;
        $training_schedule->date=$request->date;
        $training_schedule->session_name=$request->session_name;
        $training_schedule->session_type=$request->session_type;
        $training_schedule->start_time=$request->start_time;
        $training_schedule->end_time=$request->end_time;
        $training_schedule->venue=$request->venue;
        $training_schedule->coach_id=$request->coach;
        $training_schedule->comments=$request->comments;
        $training_schedule->created_by=Auth::user()->id;
        $data=$request->get('select');
        $training_schedule->save();
        Session::put('key',$training_schedule->training_id);
        //return redirect()->route('training.create');
        return $this->addAthleteTrainingInfo($data);
    }
    public function addAthleteTrainingInfo($data)
    {
        $athlete_id=$data;
        $training_id=Session::get('key');
        foreach ($athlete_id as $athlete){
            $AthleteTrainingSchedule=new AthleteTrainingSchedule;
            $AthleteTrainingSchedule->training_id = $training_id;
            $AthleteTrainingSchedule->athlete_id = $athlete;
            $AthleteTrainingSchedule->save();
        }
        return redirect()->route('training.create');
    }

    public function view(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = Athlete_bioinformation::find($id);
            return response()->json($info);
        }
    }
   public function show(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = Athlete_address::where('athlete_id',$id)->first();
            return response()->json($info);
        }
    }

    public function showAssociatedSport(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = Associated_Sport::where('sport_id',$id)->first();
            return response()->json($info);
        }
    }

    public function getTrainingSchedule(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = TrainingSchedule::find($id);
            return response()->json($info);
        }
    }

    public function showAthleteTrainingSchedule(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info =AthleteTrainingSchedule::where('athlete_id',$id)->get();
            return response()->json($info);
        }
    }
    public function update(Request $request)
    {
        $id = $request ->edit_id;
        $training_schedule=TrainingSchedule::findOrFail($id);
        $training_schedule->session_name=$request->session_name;
        $training_schedule->venue=$request->venue;
        $training_schedule->start_time=$request->start_time;
        $training_schedule->comments=$request->comments;
        $training_schedule->date=$request->date;
        $training_schedule->end_time=$request->end_time;
        $training_schedule->day_id=$request->day;
        $training_schedule->session_type=$request->session_type;
        $training_schedule->save(); 
        return redirect()->route('training.create');  
    }

    public function saveAthleteAttendance(Request $request)
    {
        $training_id=$request->hidden_training_id;
        $athlete_id=$request->get('select');
        foreach ($athlete_id as $athlete){
            $record_attendance=new AtheleteTrainingAttendance();
            $record_attendance->athlete_id = $athlete;
            $record_attendance->training_id = $training_id;
            $record_attendance->save();
        }
        return redirect()->route('training.attendance');
    }

    public function viewAthleteTrainingSchedule($id)
    {
      $athletes=Athlete_bioinformation::where('athlete_id',$id)->get();
      return view('sport_organization_user.training_information.view_training_schedule',compact('athletes'));
    }
}
