<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pricing;
use Toastr;
use File;
use Str;

class PricingController extends Controller
{
    // Module Data
    public function __construct(){
        $this->title = 'Pricing';
        $this->route = 'admin.pricing';
        $this->view = 'admin.pricing';
        $this->access    = 'pricing';

    
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

        $data['rows'] = Pricing::orderby('id','desc')->get();

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

        return view($this->view.'.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Field validation
        $request->validate([
            'title' => 'required|max:255|unique:pricings,title',
            'price' => 'required'
        ]);
        
        // Data insert
        $pricing = New Pricing;
        $pricing->title = $request->title;
        $pricing->slug = Str::slug($request->title,'-');
        $pricing->price = $request->price;
        $pricing->old_price = $request->old_price;
        $pricing->duration= $request->duration;
        $pricing->description = json_encode($request->features, JSON_UNESCAPED_UNICODE);
        $pricing->save();

        Toastr::success('Data has been Added Successfully');

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
    public function edit(Pricing $pricing)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;

        $data['pricing'] = $pricing;

        return view($this->view.'.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pricing $pricing)
    {
        //Field validation
        $request->validate([
            'title' => 'required|max:255|unique:pricings,title,'.$pricing->id,
            'price' => 'required'
        ]);
        
        // Update insert
        $pricing->title = $request->title;
        $pricing->slug = Str::slug($request->title,'-');
        $pricing->price = $request->price;
        $pricing->old_price = $request->old_price;
        $pricing->duration= $request->duration;
        $pricing->status = $request->status;
        $pricing->description = json_encode($request->features, JSON_UNESCAPED_UNICODE);
        $pricing->Update();

        Toastr::success('Data has been update Successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pricing $pricing)
    {   
        // Data delete
        $pricing->delete();

        toastr::success('Data has been Delete Successfully');

        return redirect()->back();
    }
}
