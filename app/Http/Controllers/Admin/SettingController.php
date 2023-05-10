<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;
use Toastr;
use Hash;
use File;
use Auth;
use Str;

class SettingController extends Controller
{
    //Module data
    public function __construct(){
        $this->title = 'Setting';
        $this->route = 'admin.setting';
        $this->view = 'admin.setting';
        $this->path = 'dashboard/uploads/setting';
        $this->access    = 'setting';

    
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

        $data['row'] = Setting::first();

        return view($this->view.'.index',$data);
    }


    public function siteInfo(Request $request){
        
        // field validation
        $request->validate([
            'title' => 'required|max:250',
            'logo_image' => 'nullable|image',
            'favicon_image' => 'nullable|image',
        ]);
        
        $id = $request->id;

        // image added
        if($request->hasfile('logo_image')){

            $old_data = Setting::find($id);

            if(isset($old_data->logo_path)){
                $file = $this->path.'/'.$old_data->logo_path;
                if(File::exists($file)){
                    File::delete($file);
                }
            }
            $file = $request->file('logo_image');
            $extension = $file->getClientOriginalname();
            $logo_file = time().$extension;

            // create public path
            $path = public_path($this->path);

            if(! File::exists($path)){
                File::makeDirectory($path,0777,true,true);
            }

            $file->move($path,$logo_file);
        }
        else{
            $old_data = Setting::find($id);
            if(isset($old_data->logo_path)){
                $logo_file = $old_data->logo_path;
            }
            else{
                $logo_file = null;
            }
        }

        if($request->hasfile('favicon_image')){
            
            $old_data = Setting::find($id);

            if(isset($old_data->favicon_path)){
                $file = $this->path.'/'.$old_data->favicon_path;
                if(File::exists($file)){
                    File::delete($file);
                }
            }

            $file = $request->file('favicon_image');
            $extension = $file->getClientOriginalname();
            $favicon_file = time().$extension;

            // create public path
            $path = public_path($this->path);

            if(! File::exists($path)){
                File::makeDirectory($path,0777,true,true);
            }

            $file->move($path,$favicon_file);
        }
        else{
            $old_data = Setting::find($id);
            if(isset($old_data->logo_path)){
                $favicon_file = $old_data->favicon_path;
            }
            else{
                $favicon_file = null;
            }
        }
        // insert data
        if($id==-1){
            $setting = new Setting;
            $setting->title = $request->title;
            $setting->description = $request->description;
            $setting->logo_path = $logo_file;
            $setting->favicon_path = $favicon_file;
            $setting->save();
        }
        else{
            // updata data
            $setting = Setting::find($id);
            $setting->title = $request->title;
            $setting->description = $request->description;
            $setting->logo_path = $logo_file;
            $setting->favicon_path = $favicon_file;
            $setting->save(); 
        }

        toastr::success('data has been update succefully');

        return redirect()->back();
    }


    public function contactInfo(Request $request){
        
        // Field Validation
        $request->validate([
            'phone_one' => 'required|max:50',
            'phone_two' => 'nullable|max:50',
            'email_one' => 'required',
            'email_two' => 'nullable',
            'contact_address' => 'required',
            'contact_mail' => 'required',
        ]);

        $id = $request->id;

        // -1 means no data row found
            if($id == -1){
                // insert data
                $setting = New Setting;
                $setting->phone_one = $request->phone_one;
                $setting->phone_two = $request->phone_two;
                $setting->email_one = $request->email_one;
                $setting->email_two = $request->email_two;
                $setting->contact_address = $request->contact_address;
                $setting->contact_mail = $request->contact_mail;
                $setting->google_map = $request->google_map;
                $setting->office_hours =  $request->office_hours;
                $setting->save();
            }
            else{
                // updata data
                $setting =  Setting::find($id);
                $setting->phone_one = $request->phone_one;
                $setting->phone_two = $request->phone_two;
                $setting->email_one = $request->email_one;
                $setting->email_two = $request->email_two;
                $setting->contact_address = $request->contact_address;
                $setting->contact_mail = $request->contact_mail;
                $setting->google_map = $request->google_map;
                $setting->office_hours =  $request->office_hours;
                $setting->save();
            }

            toastr::success('data has been update successfully');

            return redirect()->back();

    }

    public function customCss(Request $request){
        
        // field Validation
        $request->validate([
            'custom_css' => 'nullable'
        ]);

        $id = $request->id;
        // -1 means no data row found
        if($id==-1){
            $setting = new Setting;
            $setting->custom_css = $request->custom_css;
            $setting->save();
        }
        else{
            // data update
            $setting = Setting::find($id);
            $setting->custom_css = $request->custom_css;
            $setting->save();
        }
        
        toastr::success('data has been update successfully');

        return redirect()->back();

    }

    public function changeMail(Request $request){
        
        // field Validation
        $request->validate([
            'email' => 'required|email'
        ]);

        if($request->email != Auth::user()->email){
            $user  = User::find(Auth::user()->id);
            $user->email = $request->email;
            $user->save();
            Auth::logout();

            toastr::success('data has been update succefully');

            return redirect()->route('login');
        }
        else{
            return redirect()->route('admin.dashboard.index'); 
        }
    }

    public function changePass(Request $request){

        // Field Validation
        $request->validate([
            'old_password' =>'required',
            'password' => 'nullable|confirmed|min:8'
        ]);

        $old_password = $request->old_password;
        $hashedPassword = Auth::user()->password;

        if(Hash::check($old_password,$hashedPassword)){
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            toastr::success('password has been change successfully');

            return redirect()->route('login');
        }
        else{
            toastr::info('your old password not right');

            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
