<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Skill;
use App\Models\Category;
use App\Models\Post;

class AdminController extends Controller
{
    public function renderWelcomePage () 
    {
        $skills = Skill::all();

        return view('welcome', [
            'skills' => $skills
        ]);
    }

    public function renderPublicPages ($name)
    {
        $data = [];
        switch(strtoupper($name)) {
            case 'WORKS':
                $data = [];
                break;
            case 'BLOG':

                $category_id = request()->get('category_id', '');
                $data['categories'] = Category::all();
                if($category_id) {
                    $data['posts'] = Post::where('category_id', $category_id)->get(); 
                } else {
                    $data['posts'] = Post::all();
                }
                
                break;

            case 'CONTACTS':

                break; 
        }
        return view("pages.$name", $data);
    }

    public function renderUsers ()
    {
        $users = User::all();

        return view('admin.users')->with('users', $users);
    }

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

        return redirect( route('renderUsers', $user->id) );
    }

    public function renderAddUser ()
    {
        return view('admin.add');
    }

    public function addUser ()
    {
        $data = request()->all();
        $user = null;
        if(isset($data['name']) && isset($data['email']) && isset($data['password'])) {
            $user = User::create($data);
        }
        if($user) {
            return redirect( route('renderUsers') );
        } 
        return abort(400);
    }

}
