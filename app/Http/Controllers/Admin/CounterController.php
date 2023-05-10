<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Counter;
use Toastr;
use Str;

class CounterController extends Controller
{
    // Module Data
    public function __construct(){
        $this->title = 'Counter';
        $this->route = 'admin.counter';
        $this->view = 'admin.counter';
        $this->access    = 'counter';

    
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

        $data['rows'] = Counter::orderby('id','desc')->get();

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
        //Field Validation
        $request->validate([
            'title' => 'required|max:255|unique:counters,title',
            'value' => 'required|Numeric'
        ]);

        // Data Added 
        $counter = new Counter;
        $counter->title = $request->title;
        $counter->slug = Str::slug($request->title,'-');
        $counter->description = $request->description;
        $counter->icon = $request->icon;
        $counter->value = $request->value;
        $counter->save();

        toastr::success('Data has been Added Successfully');

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
    public function edit(Counter $counter)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;

        $data['counter'] = $counter;

        return view($this->view.'.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Counter $counter)
    {
        //Field Validation
        $request->validate([
            'title' => 'required|max:255|unique:counters,title,'.$counter->id,
            'value' => 'required|Numeric'
        ]);

        // Data update
        $counter->title = $request->title;
        $counter->slug = Str::slug($request->title,'-');
        $counter->description = $request->description;
        $counter->icon = $request->icon;
        $counter->value = $request->value;
        $counter->update();

        toastr::success('Data has been update Successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Counter $counter)
    {
        //Data Delete 
        $counter->delete();

        toastr::success('Data has been Delete successfully');

        return redirect()->back();
    }
}
