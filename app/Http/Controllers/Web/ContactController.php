<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactEmail;
use App\Models\Setting;
use Toastr;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['setting'] = Setting::first();

        return view('web.contact');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // user data store
        $contactEmail = new ContactEmail;
        $contactEmail->name = $request->name;
        $contactEmail->phone = $request->phone;
        $contactEmail->email = $request->email;
        $contactEmail->subject = $request->subject;
        $contactEmail->message = $request->message;
        $contactEmail->save();

        toastr::success('your message has been sent');

        return redirect()->back();

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
