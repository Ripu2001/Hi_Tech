<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Toastr;
use File;
use Str;


class AboutController extends Controller
{
    // Module Data
    public function __construct(){
        $this->title = 'About';
        $this->route = 'admin.about';
        $this->view = 'admin.about';
        $this->path = 'dashboard/uploads/about';
        $this->access    = 'about';


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

        $data['about'] = About::first();

        return view($this->view.'.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Field validation
        $request->validate([
            'title' => 'required'
        ]);

        $id = $request->id;

        // image Update
        if($request->hasfile('image')){
            $old_data = About::find($id);
            if(isset($old_data->image_path)){
                $file = $this->path.'/'.$old_data->image_path;
                if(File::exists($file)){
                    File::delete($file);
                }
            }
            $file =  $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().$extension;

            // create public path
            $path = public_path($this->path);

            if(! File::exists($path)){
                File::makeDirectory($path,0777,true.true);
            }
            $file->move($path,$filename);
        }
        else{
            $old_data = About::find($id);
            if(isset($old_data->image_path)){
                $filename = $old_data->image_path;
            }
            else{
                $filename = null;
            }
        }

        // data insert
        if($id==-1){
            $about = New About;
            $about->title = $request->title;
            $about->slug = Str::slug($request->title,'-');
            $about->description = $request->description;
            $about->image_path = $filename;
            $about->video_id = $request->video;
            $about->mission_title = $request->mission_title;
            $about->mission_desc = $request->mission_desc;
            $about->vission_title = $request->vission_title;
            $about->vission_desc = $request->vission_desc;
            $about->save();
        }
        else{
            // update data
            $about = About::find($id);
            $about->title = $request->title;
            $about->slug = Str::slug($request->title,'-');
            $about->description = $request->description;
            $about->image_path = $filename;
            $about->video_id = $request->video;
            $about->mission_title = $request->mission_title;
            $about->mission_desc = $request->mission_desc;
            $about->vission_title = $request->vission_title;
            $about->vission_desc = $request->vission_desc;
            $about->save();
        }
        $about->save();

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
