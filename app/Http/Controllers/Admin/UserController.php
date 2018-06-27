<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $users = User::where("role", "admin")->get();
        return view('admin.user.index', compact('users'));
    }

    public function add()
    {
        return view('admin.user.add');
    }

    public function saveUser(Request $request)
    {
        
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
            'role' => 'admin',
            'position' => $request->get('position'),
            'verified' => 1
          ]);
        if($user){
            alert()->success('Success','Saved');
            return redirect('/admin/user');
        }
    }

    

}
