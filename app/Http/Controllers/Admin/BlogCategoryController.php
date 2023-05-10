<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Toastr;
use File;
use Str;

class BlogCategoryController extends Controller
{

    //Module data
    public function __construct(){
        $this->title = 'Blog Category';
        $this->route = 'admin.blog-category';
        $this->view = 'admin.blog-category';
        $this->access    = 'blog-category';

    
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
        
        $data['rows'] = BlogCategory::orderby('id','desc')->get();

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
        //Field Validation 
        $request->validate([
            'title' => 'required|max:120|unique:blog_categories,title'
        ]);

        // Data added
        $blog_category = new BlogCategory;
        $blog_category->title = $request->title;
        $blog_category->slug = Str::slug($request->title,'-');
        $blog_category->description = $request->descripton;
        $blog_category->save();

        toastr::success('Data has been added successful');

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
    public function edit(BlogCategory $blogCategory)
    {
        //
        $data['title'] = $this->title ;
        $data['route'] = $this->route;
        $data['view'] = $this->view;

        $data['blogCategory'] = $blogCategory;

        return view($this->view.'.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogCategory $blogCategory)
    {
        //Field Validation 
        $request->validate([
            'title' => 'required|max:120|unique:blog_categories,title,'.$blogCategory->id,
        ]);

        // Data Update
        $blogCategory->title = $request->title;
        $blogCategory->slug = Str::slug($request->title,'-');
        $blogCategory->description = $request->descripton;
        $blogCategory->status = $request->status;
        $blogCategory->update();

        toastr::success('Data has been update successful');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
