<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Toastr;
use File;
use Str;

class TestimonialController extends Controller
{
    // Module Data
    public function __construct(){
        $this->title = 'Testimonial';
        $this->route = 'admin.testimonial';
        $this->view = 'admin.testimonial';
        $this->path = 'dashboard/uploads/testimonial';
        $this->access    = 'testimonial';

    
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

        $data['rows'] = Testimonial::orderby('id','desc')->get();

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
            'title' => 'required|max:255|unique:testimonials,title'
        ]);

        $testimonial = New Testimonial;
        $testimonial->title = $request->title;
        $testimonial->slug = Str::slug($request->title.'-');
        $testimonial->description = $request->description;
        $testimonial->designation = $request->designation;
        $testimonial->organization = $request->organization;

        // Image Insert
        if($request->hasfile('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;

            // create Public path
            $path = public_path($this->path);

            if(! File::exists($path)){
                File::makeDirectory($path,0777,true,true);
            }

            $file->move($path,$filename);
            
            $testimonial->image_path = $filename;
        }

        $testimonial->save();

        toastr::success('data has been added succefully');

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
    public function edit( Testimonial $testimonial)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['testimonial'] = $testimonial;

        return view($this->view.'.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        //Field Validation
        $request->validate([
            'title' => 'required|max:255|unique:testimonials,title,'.$testimonial->id,
        ]);

        // data update
        $testimonial->title = $request->title;
        $testimonial->slug = Str::slug($request->title.'-');
        $testimonial->description = $request->description;
        $testimonial->designation = $request->designation;
        $testimonial->organization = $request->organization;
        $testimonial->status = $request->status;

        // Image update
        if($request->hasfile('image')){

            // old file location
            $destination = $this->path.'/'.$testimonial->image_path;

            // old file delete
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;

            // create Public path
            $path = public_path($this->path);

            if(! File::exists($path)){
                File::makeDirectory($path,0777,true,true);
            }

            $file->move($path,$filename);
            
            $testimonial->image_path = $filename;
        }

        $testimonial->save();

        toastr::success('data has been update succefully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        //Data delete
        $testimonial->delete();

        toastr::success('data has been delete successfully');

        return redirect()->back();
    }
}
