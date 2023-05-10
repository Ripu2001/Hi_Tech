<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FaqCategory;
use App\Models\Faq;
use Toastr;
use Str;

class Faqcontroller extends Controller
{
    // Module data
    public function __construct(){
        $this->title = 'Faq';
        $this->route = 'admin.faq';
        $this->view = 'admin.faq';
        $this->access    = 'faq';

    
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

        $data['rows'] = Faq::orderby('id','desc')->get();

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

        $data['categories'] = FaqCategory::where('status',1)->get();

        return view($this->view.'.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Field Validation
        $request->validate([
            'title' => 'required|max:255|unique:faqs,title',
        ]);

        // Data insert
        $faq = New Faq;
        $faq->title = $request->title;
        $faq->slug = Str::slug($request->title,'-');
        $faq->description = $request->description;
        $faq->category_id = $request->category_id;
        $faq->save();

        toastr::success('Data has been added successfully');

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
    public function edit(Faq $faq)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;

        $data['categories'] = FaqCategory::where('status',1)->get();
        $data['faq'] = $faq;

        return view($this->view.'.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Faq $faq)
    {
        //Field Validation
        $request->validate([
            'title' => 'required|max:255|unique:faqs,title,'.$faq->id,
        ]);

        // Data update
        $faq->title = $request->title;
        $faq->slug = Str::slug($request->title,'-');
        $faq->description = $request->description;
        $faq->category_id = $request->categories;
        $faq->status = $request->status;
        $faq->update();

        toastr::success('Data has been update successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        //Data delete
        $faq->delete();

        toastr::success('data has been delete successfully');

        return redirect()->back();
    }
}
