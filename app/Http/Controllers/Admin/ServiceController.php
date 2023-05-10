<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Toastr;
use File;
use Str;

class ServiceController extends Controller
{
    // Module Data
    public function __construct(){
        $this->title = 'Service';
        $this->route = 'admin.service';
        $this->view = 'admin.service';
        $this->path = 'dashboard/uploads/service';
        $this->access    = 'service';

    
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
        $data['path'] = $this->path;

        $data['rows'] = Service::orderby('id','desc')->get();

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
        $data['path'] = $this->path;

        return view($this->view.'.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Field Validation
        $request->validate([
            'title' => 'required|max:255|unique:services,title',
            'image' => 'required|mimes:jpg,png,jpeg,gif'
        ]);

        // Data Insert
        $service = new Service;
        $service->title  = $request->title;
        $service->slug = Str::slug($request->title,'-');
        $service->description = $request->description;

        // image Added
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;

            // create public folder
            $path = public_path($this->path);
            if(! File::exists($path)){
                File::makeDirectory($path,0777,true,true);
            }

            $file->move($path,$filename);
            $service->image_path = $filename;
        }
        $service->save();

        toastr::success('Data has been Adden Successfully');
        
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
    public function edit(Service $service)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['service'] = $service;

        return view($this->view.'.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //Field Validation
        $request->validate([
            'title' => 'required|max:255|unique:services,title,'.$service->id,
            'image' => 'required|mimes:jpg,png,jpeg,gif'
        ]);

        // Data Update
        $service->title  = $request->title;
        $service->slug = Str::slug($request->title,'-');
        $service->status = $request->status;
        $service->description = $request->description;

        // image update
        if($request->hasfile('image')){
            // old file location
            $destination = $this->path.'/'.$service->image_path;

            // old file delete
            if(File::exists($destination)){
                File::delete($destination);
            }
        
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;

            // create public folder
            $path = public_path($this->path);
            if(! File::exists($path)){
                File::makeDirectory($path,0777,true,true);
            }

            $file->move($path,$filename);
            $service->image_path = $filename;
        }
        $service->update();

        toastr::success('Data has been update Successfully');
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //Data Delete
        $service->delete();

        toastr::success('Datat has been Delete Successfully');

        return redirect()->back();
    }
}
