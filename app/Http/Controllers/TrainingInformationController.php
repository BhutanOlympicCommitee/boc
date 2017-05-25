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
use Carbon\Carbon;
use App\EnumDayTable;
use App\User;
use App\Tbl_Coach;
class TrainingInformationController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $associated=array();
              $user=User::where('id',Session::get('user_id'))->first();
              $associated_sport=Associated_Sport::where('sport_org_id',$user->sport_organization)->pluck('sport_id');
              $associated1=explode(',',$associated_sport);
              foreach($associated1 as $asso)
              {
                $associated[]=trim($asso,'[]');
              }

              $athlete_info=Athlete_bioinformation::whereIn('athlete_associatedSport',$associated)->get();
        //$athlete_info=Athlete_bioinformation::all();
        return view('sport_organization_user.training_information.index',compact('athlete_info'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coach_id1=array();
        $user=User::where('id',Session::get('user_id'))->first();
        $coach=Tbl_Coach::where('sport_org_id',$user->sport_organization)->pluck('coach_id');
        $coach_id=explode(',',$coach);
        foreach($coach_id as $coach1)
        {
            $coach_id1[]=trim($coach1,'[]');
        }
        $training_info=TrainingSchedule::whereIn('coach_id',$coach_id1)->get();
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
        foreach ($athlete_id as $athlete)
        {
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
        $athlete_id=$request->hidden_athlete_id;
        $record_attendance=new AtheleteTrainingAttendance();
        $record_attendance->athlete_id = $athlete_id;
        $record_attendance->training_id = $training_id;
        $record_attendance->attendance_status = $request->attendance;
        $record_attendance->comments = $request->comments;
        $record_attendance->save();
       return redirect()->route('athlete_attendance',$training_id);
    }

    public function viewAthleteTrainingSchedule($id)
    {
      $athletes=Athlete_bioinformation::where('athlete_id',$id)->get();
      return view('sport_organization_user.training_information.view_training_schedule',compact('athletes'));
    }

    public function viewTrainingParticipants($id)
    {
        $training_schedule=TrainingSchedule::where('training_id',$id)->get();
        return view('sport_organization_user.training_information.view_participants',compact('training_schedule'));
    }

    public function takeAthleteAttendance($id)
    {
        $training_schedule=TrainingSchedule::where('training_id',$id)->get();
        return view('sport_organization_user.training_information.athlete_attendance',compact('training_schedule'));
    }
    public function searchSportCoach(Request $request)
    {
        if(!empty($request->type))
        {
            $athlete_info=Athlete_bioinformation::where('athlete_associatedSport',$request->type)->get();
            return view('sport_organization_user.training_information.index',compact('athlete_info'));
        }
        else if(!empty($request->ath_id))
        {
            $athlete_info=Athlete_bioinformation::where('athlete_id',$request->ath_id)->get();
            return view('sport_organization_user.training_information.index',compact('athlete_info'));
        }
        else if(!empty($request->ath_name))
        {
            $name=explode(' ',$request->ath_name);
            $first_name=$name[0];
            $athlete_info=Athlete_bioinformation::where('athlete_fname',$first_name)->get();
            return view('sport_organization_user.training_information.index',compact('athlete_info'));
        }
        else if(!empty($request->coach))
        {
            $athlete_info=Athlete_bioinformation::join('tbl_team_members','athlete_bioinformations.athlete_id','tbl_team_members.athlete_id')
            ->join('tbl_sport_coaches','tbl_sport_coaches.gamesdetail_id','tbl_team_members.gamesdetail_id')
            ->select('athlete_bioinformations.*')
            ->where('tbl_sport_coaches.coach',$request->coach)
            ->get();
            return view('sport_organization_user.training_information.index',compact('athlete_info'));
        }
        else
        {
            $athlete_info=Athlete_bioinformation::all();
            return view('sport_organization_user.training_information.index',compact('athlete_info'));
        }

    }
    public function searchTrainingSchedule(Request $request)
    {
        if(!empty($request->from))
        {
            $carbon_today= Carbon::today();
            $carbon_today1=$carbon_today->format('Y-m-d');
            $training_info=TrainingSchedule::select('training_schedules.*')
            ->whereBetween('date',[$request->from,$carbon_today1])
            ->get();
            return view('sport_organization_user.training_information.create',compact('training_info'));

        }
        else if(!empty($request->to))
        {
            $training_info=TrainingSchedule::select('training_schedules.*')
            ->where('date','<=',$request->to)
            ->get();
            return view('sport_organization_user.training_information.create',compact('training_info'));
        }
        else if(!empty($request->day))
        {
            $training_info=TrainingSchedule::where('day_id',$request->day)->get();
            return view('sport_organization_user.training_information.create',compact('training_info'));
        }
        else if(!empty($request->coach))
        {
            $training_info=TrainingSchedule::where('coach_id',$request->coach)->get();
            return view('sport_organization_user.training_information.create',compact('training_info'));
        }
        else
            return redirect()->route('training.create');
    }
    public function searchTrainingAttendance(Request $request)
    {
        if(!empty($request->type))
        {
            $training_schedule=TrainingSchedule::where('session_type',$request->type)->get();
            return view('sport_organization_user.training_information.attendance',compact('training_schedule'));
        }
        else if(!empty($request->day) && !empty($request->to) && !empty($request->coach))
        {
            $training_schedule=TrainingSchedule::where('day_id',$request->day)
            ->where('date',$request->to)
            ->where('coach_id',$request->coach)
            ->get();
            return view('sport_organization_user.training_information.attendance',compact('training_schedule'));
        }
        else if(!empty($request->type))
        {
            $training_schedule=TrainingSchedule::where('session_type',$request->type)->get();
            return view('sport_organization_user.training_information.attendance',compact('training_schedule'));
        }
        else
            return redirect()->route('training.attendance');
    }

    public function getDay(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            
            $timestamp = strtotime( $id );

           $day = date('l', $timestamp);
           $week_day=EnumDayTable::where('day_name',$day)->first();
            return response()->json($week_day);
        }
    }
}