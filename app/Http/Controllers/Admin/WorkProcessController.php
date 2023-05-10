<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkProcess;
use Toastr;
use Str;

class WorkProcessController extends Controller
{
    // Module Data
    public function __construct(){
        $this->title = 'Work Process';
        $this->route = 'admin.work-process';
        $this->view = 'admin.work-process';
        $this->access    = 'WorkProcess';

    
        $this->middleware('permission:'.$this->access.'-show|'.$this->access.'-create|'.$this->access.'-edit|'.$this->access.'-delete', ['only' => ['index','show']]);
        $this->middleware('permission:'.$this->access.'-create', ['only' => ['create','store']]);
        $this->middleware('permission:'.$this->access.'-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:'.$this->access.'-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = $this->title ;
        $data['route'] = $this->route;
        $data['view'] = $this->view;

        $data['rows'] = WorkProcess::orderby('id','desc')->get();

        return view($this->view.'.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = $this->title ;
        $data['route'] = $this->route;
        $data['view'] = $this->view;

        return view($this->view.'.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Field validation
        $request->validate([
            'title' => 'required|max:255|unique:work_processes,title',
        ]);

        // data insert
        $workProcess =  new WorkProcess;
        $workProcess->title = $request->title;
        $workProcess->slug = Str::slug($request->title,'-');
        $workProcess->description = $request->description;
        $workProcess->icon = $request->icon;
        $workProcess->save();

        toastr::success('data has been added successfully');

        return redirect()->route($this->route.'.index');

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
        $data['title'] = $this->title ;
        $data['route'] = $this->route;
        $data['view'] = $this->view;

        $data['workProcess'] = WorkProcess::find($id);

        return view($this->view.'.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Field validation
        $request->validate([
            'title' => 'required|max:255|unique:work_processes,title,'.$id,
        ]);

        // data update
        $workProcess = WorkProcess::find($id);
        $workProcess->title = $request->title;
        $workProcess->slug = Str::slug($request->title,'-');
        $workProcess->description = $request->description;
        $workProcess->status = $request->status;
        $workProcess->icon = $request->icon;
        $workProcess->update();

        toastr::success('data has been update successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Data delete
        $workProcess = WorkProcess::find($id);
        $workProcess->delete();

        toastr::success('data has been delete successfully');

        return redirect()->back();
    }
}
