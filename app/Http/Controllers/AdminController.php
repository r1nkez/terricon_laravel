<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class AdminController extends Controller
{
    public function renderEditUsers ($id)
    {
        $user = User::find($id);
        if(!$user) {
            return abort(404);
        }
        
        return view('admin.edit')->with('user', $user);
    }
    public function editUser ($id) 
    {
        $user = User::find($id);
        if(!$user) {
            return abort(404);
        }
        $user->name = request()->get('name', $user->name);
        $user->email = request()->get('email', $user->email);
        $user->role = request()->get('role', $user->role);
        $user->save();
        return redirect( route('renderEditUsers', $user->id) );
    }
}
