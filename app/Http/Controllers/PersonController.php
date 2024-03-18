<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Person;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $people = DB::select('SELECT * FROM people;');
        return view('people.index', ['people'=>$people]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('people.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => ['required', 'string'],
            'surname'       => ['required', 'string'],
            'sa_id_number'  => ['required'],
            'mobile_number' => ['required'],
            'email_address' => ['required'],
            'birth_date'    => ['required'],
            'language'      => ['required', 'string'],
            'interest'      => ['required'],
        ]);

        $interest = json_encode($request->input('interest'));

        $personItemObj                  = new person();
        $personItemObj->name            = $request->input('name');
        $personItemObj->surname         = $request->input('surname');
        $personItemObj->sa_id_number    = $request->input('sa_id_number');
        $personItemObj->mobile_number   = $request->input('mobile_number');
        $personItemObj->email_address   = $request->input('email_address');
        $personItemObj->birth_date      = $request->input('birth_date');
        $personItemObj->language        = $request->input('language');
        $personItemObj->interest        = $interest;
        $personItemObj->save();

        //send email to registered
        Mail::to($request->input('email_address'))->send(new \App\Mail\MyEmail($request->input('name')));
        // Additional logic or redirection after successful data storage
        return redirect('/dashboard')->with('success', 'Successfully added');
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
    public function destroy($id)
    {
        person::where('id',$id)->delete();
        //return to home page
        return redirect('/dashboard')->with('success', 'Successfully Deleted');
    }
}
