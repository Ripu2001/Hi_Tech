<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MettingSchedule;
use App\Models\MeetingStatus;
use Illuminate\Http\Request;
use App\Models\MeetingType;
use App\Models\User;
use Carbon\Carbon;
use Toastr;
use File;
use Str;

class MeetingScheduleController extends Controller
{
    // Module data
    public function __construct(){

        $this->title = 'Meetind Schedule';
        $this->route = 'admin.meeting';
        $this->view = 'admin.meeting-schedule';
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data ['view'] = $this->view;


        if(!empty($request->type) || $request->type != null){
            $data['selected_type'] = $type = $request->type;
        }
        else{
            $data['selected_type'] = $type = '0';
        }

        if(!empty($request->user) || $request->user != null){
            $data['selected_user'] = $user = $request->user;
        }
        else{
            $data['selected_user'] = $user = '0';
        }
        if(!empty($request->status) || $request->status != null){
            $data['selected_status'] = $status = $request->status;
        }
        else{
            $data['selected_status'] = $status = '0';
        }
        if(!empty($request->start_date) || $request->start_date != null){
            $data['selected_start_date'] = $start_date = $request->start_date;
        }
        else{
            $data['selected_start_date'] = $start_date = date('Y-m-d', strtotime(Carbon::now()));
        }

        if(!empty($request->end_date) || $request->end_date != null){
            $data['selected_end_date'] = $end_date = $request->end_date;
        }
        else{
            $data['selected_end_date'] = $end_date = date('Y-m-d', strtotime(Carbon::today()->addYear()));
        }
        $data['statuses'] = MeetingStatus::orderby('id','asc')->get();
        $data['types'] = MeetingType::orderby('id','desc')->get();
        $data['users'] = User::all();

        // filter search
        $rows = MettingSchedule::whereDate('date', '>=', $start_date)
        ->whereDate('date', '<=', $end_date);
            if(!empty($request->type) || $request->type != null){
                $rows->where('type_id', $type);
            }
            if(!empty($request->user) || $request->user != null){
                $rows->where('user_id', $user);
            }
            if(!empty($request->status) || $request->status != null){
                $rows->where('status_id', $status);}

            $data['rows'] = $rows->orderBy('id', 'desc')->get();


        return view($this->view.'.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data ['view'] = $this->view;

        $data['statuses'] = MeetingStatus::orderby('id','asc')->get();
        $data['types'] = MeetingType::orderby('id','desc')->get();
        $data['users'] = User::all();

        return view($this->view.'.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Field Validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $meeting = New MettingSchedule;
        $meeting->name = $request->name;
        $meeting->type_id = $request->type;
        $meeting->status_id = $request->status;
        $meeting->address = $request->address;
        $meeting->Organization = $request->organization;
        $meeting->email = $request->email;
        $meeting->phone = $request->phone;
        $meeting->date = $request->date;
        $meeting->in_time = $request->in_time;
        $meeting->out_time = $request->out_time;
        $meeting->user_id =$request->user;
        $meeting->save();

        return redirect()->route($this->route.'.index');

        toastr::success('data has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
