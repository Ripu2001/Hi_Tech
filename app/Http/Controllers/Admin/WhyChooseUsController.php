<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhyChooseUs;
use Toastr;
use Str;

class WhyChooseUsController extends Controller
{
    // Module Data
    public function __construct(){
        $this->title = 'Why Choose Us';
        $this->route = 'admin.why-choose-us';
        $this->view = 'admin.why-choose-us';
        $this->access    = 'WhyChooseUs';


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

        $data['rows'] = WhyChooseUs::orderby('id','desc')->get();

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
        // Field Validation
        $request->validate([
            'title' => 'required|max:255|unique:why_choose_us,title'
        ]);


        // Data Insert
        $whyChooseUs = new WhyChooseUs;
        $whyChooseUs->title = $request->title;
        $whyChooseUs->slug = Str::slug($request->title,'-');
        $whyChooseUs->description = $request->description;
        $whyChooseUs->icon = $request->icon;

        $whyChooseUs->save();

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
    public function edit($id)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;

        $data['row'] = WhyChooseUs::find($id);

        return view($this->view.'.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // Field Validation
        $request->validate([
            'title' => 'required|max:255|unique:why_choose_us,title,'.$id
        ]);

        // Data update
        $whyChooseUs = WhyChooseUs::find($id);
        $whyChooseUs->title = $request->title;
        $whyChooseUs->slug = Str::slug($request->title,'-');
        $whyChooseUs->description = $request->description;
        $whyChooseUs->status = $request->status;
        $whyChooseUs->icon = $request->icon;

        $whyChooseUs->update();

        toastr::success('data has been added successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $whyChooseUs = WhyChooseUs::find($id);
        $whyChooseUs->delete();

        toastr::success('data has been delete succefully');

        return redirect()->back();
    }
}
