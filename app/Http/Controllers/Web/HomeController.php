<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Pricing;
use App\Models\Slider;
use App\Models\Member;
use App\Models\About;

class HomeController extends Controller
{
    public function index(){
        
        $data['sliders'] = Slider::orderby('id','desc')
                            ->take(3)
                            ->get();

        $data['teams'] = Member::orderby('id','desc')->get();

        $data['services'] = Service::orderby('id','desc')->get();

        $data['portfolio_categories'] = PortfolioCategory::orderby('id','desc')->get();

        $data['portfolios'] = Portfolio::orderby('id','desc')->get();

        $data['about'] = About::first();

        $data['pricings'] = Pricing::orderby('id','asc')->get();


        return view('web.index',$data);
    }
}
