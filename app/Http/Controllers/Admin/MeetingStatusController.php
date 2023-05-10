<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MeetingStatus;
use Toastr;
use Str;

class MeetingStatusController extends Controller
{

    public function __construct(){
        $this->title = 'Meeting Status';
        $this->route = 'admin.meeting-status';
        $this->view = 'admin.meeting-status';

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;

        $data['rows'] = MeetingStatus::orderby('id','desc')->get();

        return view($this->view.'.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //field validation
       $request->validate([
            'title' => 'required|unique:meeting_statuses,title',
            'color' => 'required',
       ]);

       $meetingStatus = new MeetingStatus;
       $meetingStatus->title = $request->title;
       $meetingStatus->slug = Str::slug($request->title,'-');
       $meetingStatus->color = $request->color;
       $meetingStatus->save();

       toastr::success('data has been added succefully');

       return redirect()->back();
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
    public function edit(MeetingStatus $meetingStatus)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;

        $data['status'] = $meetingStatus;

        return view($this->view.'.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MeetingStatus $meetingStatus)
    {
            //field validation
        $request->validate([
            'title' => 'required|unique:meeting_statuses,title,'.$meetingStatus->id,
            'color' => 'required',
    ]);
    $meetingStatus->title = $request->title;
    $meetingStatus->slug = Str::slug($request->title,'-');
    $meetingStatus->color = $request->color;
    $meetingStatus->update();

    toastr::success('data has been update succefully');

    return redirect()->route($this->route.'.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MeetingStatus $meetingStatus)
    {
        $meetingStatus->delete();

        toastr::success('data has been delete successfully');

        return redirect()->back();
    }
}
