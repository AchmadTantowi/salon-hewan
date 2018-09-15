<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->position != "Pemilik"){
            abort(404);
        }
        $users = User::where("role", "admin")->get();
        return view('admin.user.index', compact('users'));
    }

    public function add()
    {
        if(Auth::user()->position != "Pemilik"){
            abort(404);
        }
        return view('admin.user.add');
    }

    public function saveUser(Request $request)
    {
        if(Auth::user()->position != "Pemilik"){
            abort(404);
        }
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'position' => 'required'
        ]);
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

    public function edit($id){
        if(Auth::user()->position != "Pemilik"){
            abort(404);
        }
        $user = User::where('user_id', $id)->first();
        return view('admin.user.edit', compact('user'));
    }

    public function update($id, Request $request){
        if(Auth::user()->position != "Pemilik"){
            abort(404);
        }
        $pass = $request->get('password');
        if(!is_null($pass)){
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'position' => 'required'
            ]);
        } else {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'position' => 'required'
            ]);
        }
        
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->address = $request->get('address');
        $user->phone = $request->get('phone');
        $user->position = $request->get('position');

        if(!is_null($pass)){
            $user->password = bcrypt($request->get('password'));
        }
       
        $user->save();
        alert()->success('Updated','Successfully');
        return redirect('/admin/user');
    }
    
    public function delete($id){
        if(Auth::user()->position != "Pemilik"){
            abort(404);
        }
        $user = User::find($id);
        $user->delete();
        if($user){
            alert()->success('Deleted','Successfully');
            return redirect('/admin/user');
        }
    }

}
