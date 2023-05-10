<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    

    public function index(){

        $data['about'] = About::first();

        
        return view('web.about',$data);
    }
}
