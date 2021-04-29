<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class SessionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        // Attempt to authentication the user
        if(! auth()->attempt(request(['email', 'password'])))
        {
            return back()->withErrors([
                'message' => 'Please check your credentials and try again'
            ]);
        }

        // if so, sign them in
        return redirect()->home();
    }

    public function destory()
    {
        auth()->logout();

        return redirect()->home();
    }
}
