<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Toastr;
use Hash;
use DB;

class UserController extends Controller
{
    
    // module data 
    public function __construct(){
        $this->title = 'user';
        $this->route = 'admin.user';
        $this->view = 'admin.user';
        $this->access    = 'user';

    
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


        $data['users'] = User::orderby('id','desc')->get();


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


        $data['roles'] = Role::orderby('id','desc')->get();


        return view($this->view.'.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //field validation
        $request->validate([
            'name' => 'required|max:100',
            'email'=>'required|email',
            'password' => 'required',
        ]);

        // insert data

        $user = new User;
        $user->name = $request->name;
        $user->email= $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        toastr::success('data has been succefully done');

        // Assign Role
        $user->roles()->attach($request->roles);

        return redirect()->route($this->route.'.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;

        $data['roles'] = Role::orderby('id','desc')->get();
        $data['user'] = User::find($id);


        return view($this->view.'.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //field validation
        $request->validate([
            'name' => 'required|max:100',
            'email'=>'required|email',
            'password' => 'required',
        ]);

        // insert data

        $user = User::find($id);
        $user->name = $request->name;
        $user->email= $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        toastr::success('data has been update succefully ');

        // Assign Role
        $user->roles()->sync($request->roles);

        return redirect()->route($this->route.'.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        toastr::success('data has been delete succefully ');

        
        return redirect()->route($this->route.'.index');
    }
}
