<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;
use App\Models\Member;
use Toastr;
use File;
use Str;

class MemberContoller extends Controller
{
    // Module Data
    public function __construct(){
        $this->title = 'Team';
        $this->route = 'admin.member';
        $this->view = 'admin.team';
        $this->path = 'dashboard/uploads/team';
        $this->access    = 'team';

    
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

        $data['rows'] = Member::orderby('id','desc')
                        ->get();

        return view($this->view.'.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['designations'] = Designation::where('status',1)->get();

        return view($this->view.'.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Field validation
        $request->validate([
            'name' => 'required|max:50',
        ]);

        // Data Insert
        $member = New Member ;
        $member->name = $request->name;
        $member->slug = Str::slug($request->name,'-');
        $member->description = $request->description;
        $member->facebook = $request->facebook;
        $member->twitter = $request->twitter;
        $member->instagram = $request->instagram;
        $member->linkedin = $request->linkedin;
        $member->email = $request->email;
        $member->phone = $request->phone;
        $member->website = $request->website;
        $member->designation_id = $request->designation;

        // Image Insert
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;

            // create folder locaton
            $path = public_path($this->path);
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            
            $file->move($path,$filename);
            $member->image_path = $filename;
        }

        $member->save();

        toastr::success('Data has bess added successfully');

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
    public function edit(Member $member)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['member'] = $member;
        $data['designations'] = Designation::where('status',1)->get();

        return view($this->view.'.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        //Field validation
        $request->validate([
            'name' => 'required|max:50',
        ]);

        // Data Update
        $member->name = $request->name;
        $member->slug = Str::slug($request->name,'-');
        $member->description = $request->description;
        $member->facebook = $request->facebook;
        $member->twitter = $request->twitter;
        $member->instagram = $request->instagram;
        $member->linkedin = $request->linkedin;
        $member->email = $request->email;
        $member->phone = $request->phone;
        $member->website = $request->website;
        $member->status = $request->status;
        $member->designation_id = $request->designation;

        // Image update
        if($request->hasfile('image')){
           
            // old file location
            $destination = $this->path.'/'.$member->image_path;

            // old file delete
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;

            // create folder locaton
            $path = public_path($this->path);
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            
            $file->move($path,$filename);
            $member->image_path = $filename;
        }

        $member->update();

        toastr::success('Data has bess update');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //Data Delete
        $member->delete();

        toastr::success('data has been delete');

        return redirect()->back();
    }
}
