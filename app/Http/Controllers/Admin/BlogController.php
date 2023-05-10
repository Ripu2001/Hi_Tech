<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\Blog;
use Toastr;
use File;
use Str;

class BlogController extends Controller
{
    // Module Data
    public function __construct(){
        $this->title = 'Blog';
        $this->route = 'admin.blog';
        $this->view = 'admin.blog';
        $this->path = 'dashboard/uploads/blog';
        $this->access    = 'blog';

    
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
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['rows'] = Blog::orderby('id','desc')->get();

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

        $data['categories'] = BlogCategory::where('status',1)->get();

        return view($this->view.'.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Field Validation 
        $request->validate([
            'title'=> 'required|max:255|unique:blogs,title',
            'image'=>'required',
        ]);

        // Data Insert
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->category_id = $request->category;
        $blog->slug = Str::slug($request->title);
        $blog->description = $request->description;

        // image Insert
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().$extension;

            // create file location
            $path=public_path($this->path);
            if(! File::exists($path)){
                File::makeDirectory($path,0777,true,true);
            }

            $file->move($path,$filename);
            $blog->image_path = $filename;
        }
        $blog->save();

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
    public function edit(Blog $blog)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['categories'] = BlogCategory::where('status',1)->get();
        $data['blog'] = $blog;

        return view($this->view.'.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //Field Validation 
        $request->validate([
            'title'=> 'required|max:255|unique:blogs,title,'.$blog->id,
            'image'=>'required'
        ]);


        // Data Update
        $blog->title = $request->title;
        $blog->category_id = $request->category;
        $blog->status = $request->status;
        $blog->slug = Str::slug($request->title);
        $blog->description = $request->description;

        // image update
        if($request->hasfile('image')){
            // old file location
            $destination = $this->path.'/'.$blog->image_path;

            // old file delete
            if(File::exists($destination)){
                File::delete($destination);
            }

            // new file added
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().$extension;

            // create file location
            $path=public_path($this->path);
            if(! File::exists($path)){
                File::makeDirectory($path,0777,true,true);
            }

            $file->move($path,$filename);
            $blog->image_path = $filename;
        }
        $blog->update();

        toastr::success('data has been update successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //Data Delete
        $blog->delete();

        toastr::success('Data has been Delete Succeully');
        
        return redirect()->back();
    }
}
