<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {

        return view('admin/admin-login');
    }

    public function login(Request $request)
    {

        $this->validate($request ,[
            'email' => 'required',
            'password' => 'required|min:8'
        ]);

       if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
        return redirect()->intended(route('admin.dashboard'));
       }

       return redirect()->back()->withInput($request->only('email'));

    }
}
