<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class AdminController extends Controller
{
    public function renderUsers ()
    {
        $users = User::all();
        
        return view('admin.users', [
            'users' => $users
        ]);
    }

    public function editUsers (Request $request)
    {
        $data = $request->all();

        User::update($data);

        return redirect('renderUsers');
    }
}
