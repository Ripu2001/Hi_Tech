<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Toastr;
use Str;

class PortfolioCategoryController extends Controller
{
    // Module Data
    public function __construct(){
        $this->title = 'Portfolio Category';
        $this->route = 'admin.portfolio-category';
        $this->view = 'admin.portfolio-category';
        $this->access    = 'portfolio-category';

    
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
        
        $data['rows'] = PortfolioCategory::OrderBy('id','desc')->get();


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
            'title' => 'Required|max:255|unique:portfolio_categories,title'
        ]);

        // Data Insert
        $portfolio_category = new PortfolioCategory;
        $portfolio_category->title  = $request->title;
        $portfolio_category->slug = Str::slug($request->title,'-');
        $portfolio_category->description = $request->description;
        $portfolio_category->save();

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
    public function edit(PortfolioCategory $portfolioCategory)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        
        $data['portfolioCategory'] = $portfolioCategory;

        return view($this->view.'.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PortfolioCategory $portfolioCategory)
    {
        //Field Validation
        $request->validate([
            'title' => 'Required|max:255|unique:portfolio_categories,title,'.$portfolioCategory->id,
        ]);

        // Data update
        $portfolioCategory->title  = $request->title;
        $portfolioCategory->slug = Str::slug($request->title,'-');
        $portfolioCategory->description = $request->description;
        $portfolioCategory->status = $request->status;
        $portfolioCategory->update();

        toastr::success('Data has been Update Successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PortfolioCategory $portfolioCategory)
    {
        //Data Delete
        $portfolioCategory->delete();

        toastr::success('Data has been delete Successfully');

        return redirect()->back();


    }
}
