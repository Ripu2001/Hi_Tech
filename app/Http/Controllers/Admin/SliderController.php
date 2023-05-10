<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Toastr;
use File;
use Str;

class SliderController extends Controller
{
    // Module Data
    public function __construct(){
        $this->title = 'Slider';
        $this->route = 'admin.slider';
        $this->view = 'admin.slider';
        $this->path = 'dashboard/uploads/slider';
        $this->access    = 'slider';

    
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

        $data['rows'] = Slider::orderby('id','desc')->get();

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
            'title' => 'required|unique:sliders,title|max:255',
            'image' => 'required|mimes:jpg,bmp,png'
        ]);

        // Data Insert
        $slider = New Slider;
        $slider->title = $request->title;
        $slider->slug = Str::slug($request->title,'-');
        $slider->description = $request->description;
        $slider->btn_link = $request->btn_link;

        // Image Insert
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;

            // create folder locaton
            $path = public_path($this->path);
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            
            $file->move($this->path,$filename);
            $slider->image_path = $filename;
        }

        $slider->save();

        toastr::success('Data has been added successfully!');

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
    public function edit(Slider $slider)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['slider'] = $slider;

        return view($this->view.'.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Slider $slider)
    {
        //Field Validation
        $request->validate([
            'title' => 'required|max:255|unique:sliders,title,'.$slider->id,
            'image' => 'required|mimes:jpg,bmp,png'
        ]);

        // Data update
        $slider->title = $request->title;
        $slider->slug = Str::slug($request->title,'-');
        $slider->description = $request->description;
        $slider->btn_link = $request->btn_link;
        $slider->status = $request->status;

        // Image Update
        if($request->hasfile('image')){
            
            // old file location
            $destinatin = $this->path.'/'.$slider->image_path;

            // old file delete
            if(File::exists($destinatin)){
                File::delete($destinatin);
            }

            // new file added
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $file->move($this->path,$filename);
            $slider->image_path = $filename;
        }

        $slider->save();

        toastr::success('Data has been Update successfully!');

        return redirect()->route($this->route.'.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Slider $slider)
    {
        // Data Delete
        $slider->delete();
        
        toastr::success('data has been Delete');
        
        return redirect()->back();
    }
}
