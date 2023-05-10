<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use Toastr;
use File;
use str;

class PartnerController extends Controller
{
    // Module Data
    public function __construct(){
        $this->title = 'Partner';
        $this->route = 'admin.partner';
        $this->view = 'admin.partner';
        $this->path = 'dashboard/uploads/partner';
        $this->access    = 'partner';

    
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

        $data['rows'] = Partner::orderby('id','desc')->get();

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
            'logo' => 'required|image|mimes:jpg,png,jpeg',
            'link' => 'required'
        ]);

        // data insert
        $partner = New Partner;
        $partner->link = $request->link;

        // image insert
        if($request->hasfile('logo')){
            $file = $request->file('logo');
            $extension = $file->getClientOriginalName();
            $filename = time().$extension;

            // create public path
            $path = public_path($this->path);

            if(! File::exists($path)){
                File::makeDirectory($path,0777,true,true);
            }

            $file->move($path,$filename);

            $partner->logo = $filename;

        }

        $partner->save();

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
    public function edit(Partner $partner)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['partner'] = $partner;

        return view($this->view.'.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        //Field Validation
        $request->validate([
            'logo' => 'required|image|mimes:jpg,png,jpeg',
            'link' => 'required'
        ]);

        // data update
        $partner->link = $request->link;
        $partner->status = $request->status;

        // image insert
        if($request->hasfile('logo')){
            // old image location
            $destination = $this->path.'/'.$partner->logo;

            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('logo');
            $extension = $file->getClientOriginalName();
            $filename = time().$extension;

            // create public path
            $path = public_path($this->path);

            if(! File::exists($path)){
                File::makeDirectory($path,0777,true,true);
            }

            $file->move($path,$filename);

            $partner->logo = $filename;

        }

        $partner->save();

        toastr::success('data has been update successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        //Data Delete
        $partner->delete();

        toastr::success('data has been delete successfully');

        return redirect()->back();
    }
}
