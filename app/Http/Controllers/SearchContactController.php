<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class SearchContactController extends Controller
{

    public function index()
    {
        return redirect()->route('contacts.index');
    }


    public function store(Request $request)
    {
        $users = DB::table('users')
            ->join('emails', "users.id", '=', 'emails.user_id')
            ->join('phones', "users.id", '=', 'phones.user_id')
            ->where("users.name", 'LIKE', '%' . $request->search . '%')
            ->orWhere('emails.email', 'LIKE', '%' . $request->search . '%')
            ->orWhere('phones.phone', 'LIKE', '%' . $request->search . '%')->get();

        return view('search_contacts', ['users' => $users]);
    }
}
