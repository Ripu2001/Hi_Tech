<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FaqCategory;
use Toastr;
use Str;

class FaqCategoryController extends Controller
{
    // Module Data 
    public function __construct(){
        $this->title = 'Faq Category';
        $this->route = 'admin.faq-category';
        $this->view = 'admin.faq-category';
        $this->access    = 'faq-category';

    
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

        $data['rows'] = FaqCategory::orderby('id','desc')->get();

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

        return view($this->view.'.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Field Validation
        $request->validate([
            'title' => 'required|max:255|unique:faq_categories,title',
        ]);

        // data Added
        $faqCategory = new FaqCategory;
        $faqCategory->title = $request->title;
        $faqCategory->slug = Str::slug($request->title,'-');
        $faqCategory->description = $request->description;
        $faqCategory->save();

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
    public function edit(FaqCategory $faqCategory)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;

        $data['category'] = $faqCategory;

        return view($this->view.'.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FaqCategory  $faqCategory)
    {
        //Field Validation
        $request->validate([
            'title' => 'required|max:255|unique:faq_categories,title,'.$faqCategory->id,
        ]);

        // data update
        $faqCategory->title = $request->title;
        $faqCategory->slug = Str::slug($request->title,'-');
        $faqCategory->description = $request->description;
        $faqCategory->status = $request->status;
        $faqCategory->update();

        toastr::success('Data has been update successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FaqCategory  $faqCategory)
    {
        //Data delete
        $faqCategory->delete();

        toastr::success('data has been delete succefully');

        return redirect()->back();
    }
}
