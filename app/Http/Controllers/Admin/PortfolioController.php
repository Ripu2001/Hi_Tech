<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Toastr;
use Image;
use File;
use Str;

class PortfolioController extends Controller
{
    // Module Data
    public function __construct(){
        $this->title = 'Portfolio';
        $this->route = 'admin.portfolio';
        $this->view = 'admin.portfolio';
        $this->path = 'dashboard/uploads/portfolio/';
        $this->access    = 'portfolio';

    
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

        $data['rows'] = Portfolio::orderby('id','desc')->get();

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

        $data['categories'] = PortfolioCategory::where('status',1)->get();

        return view($this->view.'.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        //Field Validation
        $request->validate([
            'title' => 'required|max:255|unique:portfolios,title',
            'image' => 'required|mimes:jpg,png,jpeg',
        ]);

        // Data Added
        $portfolio = New Portfolio;
        $portfolio->title = $request->title;
        $portfolio->slug = Str::slug($request->title,'-');
        $portfolio->description = $request->description;
        $portfolio->video_id = $request->video;
        $portfolio->link = $request->link;

        // Image Added
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().$extension;

            // Create Public path
            $path = public_path($this->path);

            if(! File::exists($path)){
                File::makeDirectory($path,0777,true,true);
            }

            $file->move($path,$filename);

            $portfolio->image_path = $filename;
        }

        $portfolio->save();

        $portfolio->categories()->attach($request->categories);

        toastr::success('Data has been added Successfully');

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
    public function edit(Portfolio $portfolio)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['categories'] = PortfolioCategory::where('status',1)->get();
        $data['portfolio'] = $portfolio;

        return view($this->view.'.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
         //Field Validation
         $request->validate([
            'title' => 'required|max:255|unique:portfolios,title,'.$portfolio->id,
            'image' => 'mimes:jpg,png,jpeg',
        ]);

        // data  update
        $portfolio->title = $request->title;
        $portfolio->slug = Str::slug($request->title,'-');
        $portfolio->description = $request->description;
        $portfolio->video_id = $request->video;
        $portfolio->status = $request->status;
        $portfolio->link = $request->link;

        // Image update
        if($request->hasfile('image')){
            
            // old file location
            $destination  = $this->path.'/'.$portfolio->image_path;

            // old Image delete
            if(File::exists($destination)){
                File::delete($destination);
            }


            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().$extension;

            // Create Public path
            $path = public_path($this->path);

            if(! File::exists($path)){
                File::makeDirectory($path,0777,true,true);
            }

            $file->move($path,$filename);

            $portfolio->image_path = $filename;
        }
        else{
            $filename = $portfolio->image_path;
        }

        $portfolio->save();

        $portfolio->categories()->sync($request->categories);

        toastr::success('Data has been added Successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        //Data Delete 
        $portfolio->categories()->detach();
        $portfolio->delete();

        toastr::success('data has been delete successfully');

        return redirect()->back();
    }
}
