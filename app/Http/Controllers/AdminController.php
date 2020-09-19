<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        return view('admin/home', compact('users'));
    }

    public function edit($user)
    {

        $userinfo = User::find($user);

        return view('admin/edit', compact('userinfo'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],

            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->update([
            'name' => $data['name'],
            'password' => Hash::make($data['password'])
        ]);

        return redirect('/admin/dashboard');
    }

    // public function destroy($id)
    // {
    //     dd($id);
    //    $delete = User::find($id);
       
    //    $delete->delete();

    //    return redirect('/admin/dashboard');
    // }
}
