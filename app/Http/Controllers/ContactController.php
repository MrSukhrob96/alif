<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\Email;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(20);
        return view('contacts.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {

        $this->validate($request, array(
            "name" => "required|unique:users|min:3|max:50",
            "email" => "required|email|unique:emails|min:8|max:50",
            "phone" => "required|unique:phones|min:9|max:15"
        ));

        $user->add($request);

        return redirect()->back()->with('success', 'User added successfuly!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, User $user)
    {
        return view('search_contacts', ['users' => $user->getOne($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, User $user)
    {
       return view('contacts.edit', ["user" => $user->getOne($id)]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, User $user)
    {
        $this->validate($request, array(
            "name" => "required|unique:users|min:3|max:50",
        ));

        $user = $user->getOne($id);
        $user->name = $request->name;
        $user->save();
        return redirect()->route('contacts.index')->with('success', 'User name editted successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, User $user)
    {
        $user->destroy($id);
        return redirect()->route('contacts.index')->with('success', 'User deleted successfuly!');
    }
}
