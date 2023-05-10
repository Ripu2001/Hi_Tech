<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MeetingType;
use Toastr;
use Str;

class MeetingTypeController extends Controller
{
    public function __construct(){
        $this->title  = 'Meeting Type';
        $this->route = 'admin.meeting-type';
        $this->view = 'admin.meeting-type';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = $this->title;
        $data['view'] = $this->view;
        $data['route'] = $this->route;

        $data['rows'] = MeetingType::orderby('id','desc')->get();

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
        //Field validation
        $request->validate([
            'title' => 'required|unique:meeting_types,title',
        ]);

        // data insert
        $meeting_type = new MeetingType;
        $meeting_type->title = $request->title;
        $meeting_type->slug = Str::slug($request->title,'-');
        $meeting_type->description = $request->description;
        $meeting_type->save();

        toastr::success('data has been added successfully');

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
    public function edit(MeetingType $meetingType)
    {

        $data['title'] = $this->title;
        $data['view'] = $this->view;
        $data['route'] = $this->route;

        $data['type'] = $meetingType;

        return view($this->view.'.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MeetingType $meetingType)
    {
        //Field validation
        $request->validate([
            'title' => 'required|unique:meeting_types,title,'.$meetingType->id,
        ]);

        // data update
        $meetingType->title = $request->title;
        $meetingType->slug = Str::slug($request->title,'-');
        $meetingType->description = $request->description;
        $meetingType->update();

        toastr::success('data has been update successfully');

        return redirect()->route($this->route.'.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MeetingType $meetingType)
    {
        //delete data
        $meetingType->delete();

        toastr::success('data has been delete successfully');

        return redirect()->back();
    }
}
