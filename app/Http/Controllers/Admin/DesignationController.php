<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;
use Toastr;
use Str;

class DesignationController extends Controller
{
    // Module Data
    public function __construct(){
        $this->title = 'Team Designation';
        $this->route = 'admin.designation';
        $this->view = 'admin.designation';
        $this->access    = 'admin-designation';

    
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
        
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;

        $data['rows'] = Designation::orderby('id','desc')
                                ->where('status',1)
                                ->get();

        return view($this->view.'.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;

        return view($this->view.'.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Field Validation
        $request->validate([
            'title' => 'required|unique:designations,title|max:120',
            'department' => 'required',
        ]);

       
        // Insert Data 
        $designation  = New Designation;
        $designation->title = $request->title;
        $designation->slug = str::slug($request->title,'-');
        $designation->department = $request->department;
        $designation->description = $request->description;
        $designation->save();

        toastr::success('Data has been added successful');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Designation $designation)
    {
        
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;

        $data['designation'] = $designation;

        return view($this->view.'.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Designation $designation)
    {
       
        //Field Validation
        $request->validate([
            'title' => 'required|max:120|unique:designations,title,'.$designation->id,
            'department' => 'required',
        ]);

        
        // Update Data 
        $designation->title = $request->title;
        $designation->slug = str::slug($request->title,'-');
        $designation->department = $request->department;
        $designation->status = $request->status;
        $designation->description = $request->description;
        $designation->save();

        toastr::success('Data has been Update successful');

        return redirect()->route($this->route.'.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Designation $designation)
    {
        //Data Delete
        $designation->delete();

        toastr::success('data has been Delete Successfully');

        return redirect()->back();
    }
}
