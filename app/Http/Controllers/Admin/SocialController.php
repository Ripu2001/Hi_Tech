<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Social;
use Toastr;
use Str;

class SocialController extends Controller
{
   
    // module data
    public function __construct(){
        $this->title = 'Social';
        $this->route = 'admin.social';
        $this->view = 'admin.social';
        $this->access    = 'social';

    
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
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;

        $data['row'] = Social::first();

        return view($this->view.'.index',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram'=>'required',
            'linkedin' =>'required',
        ]);

        $id = $request->id;

        if($id==-1){
            $social = new Social;
            $social->facebook = $request->facebook;
            $social->twitter = $request->twitter;
            $social->instagram = $request->instagram;
            $social->linkedin = $request->linkedin;
            $social->whatsapp = $request->whatsapp;
            $social->pinterest = $request->pinterest;
            $social->youtube = $request->youtube;
            $social->skype = $request->skype;
            $social->save();
        }
        else{
            $social = Social::find($id);
            $social->facebook = $request->facebook;
            $social->twitter = $request->twitter;
            $social->instagram = $request->instagram;
            $social->linkedin = $request->linkedin;
            $social->whatsapp = $request->whatsapp;
            $social->pinterest = $request->pinterest;
            $social->youtube = $request->youtube;
            $social->skype = $request->skype;
            $social->save();
        }
        toastr::success('data has been update successfully');

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
