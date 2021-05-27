<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\Phone;
use Illuminate\Http\Request;

use App\Models\User;

class ContactProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!$request->has('add') && !$request->has('id')) {
            dd('error');
        }

        return view('profile.add', ['id' => $request->input('id'), 'action' => $request->input('add')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = User::find($request->id);

        if ($request->has('email_action')) {
            $this->validate($request, array(
                'email' => 'required|email|unique:emails|min:8|max:100'
            ));
            $user->emails()->create($request->only('email'));
        }

        if ($request->has('phone_action')) {
            $this->validate($request, array(
                'phone' => 'required|unique:phones|min:9|max:15'
            ));
            $user->phones()->create($request->only('phone'));
        }

        return view('profile.index', ['user' => $user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('profile.index', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        return view('profile.edit', ['action' => $request->edit, 'id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if($request->has('phone_action'))
        {
            $data = Phone::where('id', '=', $id)->first();
            $data->phone = $request->phone;
            $data->save();
        }

        if($request->has('email_action'))
        {
            $data = Email::where('id', '=', $id)->first();
            $data->email = $request->email;
            $data->save();
        }

        return view('profile.index', ['user' => $data->user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (!(int)$id) {
            return redirect()->back();
        }

        if ($request->has('delete_email')) {
            $result = Email::where("id", "=", $id)->first()->delete();
        }

        if ($request->has('delete_phone')) {
            $result =  Phone::where("id", "=", $id)->first()->delete();
        }

        if (!$result) {
            return redirect()->back()->with("error", "Operation is not deleted successfuly!");
        }
        return redirect()->back()->with("error", "Operation is not deleted successfuly!");
    }
}
